<?php
class Cloudinary {
    private static $config = NULL;
    const SHARED_CDN = "d3jpl91pxevbkh.cloudfront.net";
    const USER_AGENT = "cld-wp-1.1.4";
    public static $JS_CONFIG_PARAMS = array("api_key", "cloud_name", "private_cdn", "secure_distribution", "cdn_subdomain");
    public static function config($values = NULL) {
        if (self::$config == NULL) {
            self::reset_config();
        }
        if ($values != NULL) {
            self::$config = array_merge(self::$config, $values);
        }
        return self::$config;
    }
    public static function reset_config() {
        self::config_from_url(get_option("CLOUDINARY_URL",null));
    }

    public static function config_from_url($cloudinary_url) {
        self::$config = array();
        if ($cloudinary_url) {
            $uri = parse_url($cloudinary_url);
            $config = array("cloud_name" => $uri["host"],
                            "api_key" => $uri["user"],
                            "api_secret" => $uri["pass"],
                            "private_cdn" => isset($uri["path"]));
            if (isset($uri["path"])) {
                $config["secure_distribution"] = substr($uri["path"], 1);
            }
            self::$config = array_merge(self::$config, $config);
        }
    }
    public static function config_get($option, $default=NULL) {
        return Cloudinary::option_get(self::config(), $option, $default);
    }
    public static function option_get($options, $option, $default=NULL) {
        if (isset($options[$option])) {
            return $options[$option];
        } else {
            return $default;
        }
    }
    public static function option_consume(&$options, $option, $default=NULL) {
        if (isset($options[$option])) {
            $value = $options[$option];
            unset($options[$option]);
            return $value;
        } else {
            unset($options[$option]);
            return $default;
        }
    }
    public static function build_array($value) {
        if (is_array($value) && $value == array_values($value)) {
            return $value;
        } else if ($value == NULL) {
            return array();
        } else {
            return array($value);
        }
    }
    private static function generate_base_transformation($base_transformation) {
        return is_array($base_transformation) ?
               Cloudinary::generate_transformation_string($base_transformation) :
               Cloudinary::generate_transformation_string(array("transformation"=>$base_transformation));
    }
    // Warning: $options are being destructively updated!
    public static function generate_transformation_string(&$options=array()) {
        $generate_base_transformation = array("Cloudinary", "generate_base_transformation");
        if ($options == array_values($options)) {
            return implode("/", array_map($generate_base_transformation, $options));
        }
        $size = Cloudinary::option_consume($options, "size");
        if ($size) list($options["width"], $options["height"]) = preg_split("/x/", $size);
        $width = Cloudinary::option_get($options, "width");
        $height = Cloudinary::option_get($options, "height");
        $has_layer = Cloudinary::option_get($options, "underlay") || Cloudinary::option_get($options, "overlay");
        if ($width && (floatval($width) < 1 || $has_layer)) unset($options["width"]);
        if ($height && (floatval($height) < 1 || $has_layer)) unset($options["height"]);
        $angle = implode(Cloudinary::build_array(Cloudinary::option_consume($options, "angle")), ".");
        $crop = Cloudinary::option_consume($options, "crop");
        if (!$crop && !$has_layer) $width = $height = NULL;
        $background = Cloudinary::option_consume($options, "background");
        if ($background) $background = preg_replace("/^#/", 'rgb:', $background);
        $base_transformations = Cloudinary::build_array(Cloudinary::option_consume($options, "transformation"));
        if (count(array_filter($base_transformations, "is_array")) > 0) {
            $base_transformations = array_map($generate_base_transformation, $base_transformations);
            $named_transformation = "";
        } else {
            $named_transformation = implode(".", $base_transformations);
            $base_transformations = array();
        }
        $effect = Cloudinary::option_consume($options, "effect");
        if (is_array($effect)) $effect = implode(":", $effect);
        $border = Cloudinary::option_consume($options, "border");
        if (is_array($border)) {
          $border_width = Cloudinary::option_get($border, "width", "2");
          $border_color = preg_replace("/^#/", 'rgb:', Cloudinary::option_get($border, "color", "black"));
          $border = $border_width . "px_solid_" . $border_color;
        }
        $flags = implode(Cloudinary::build_array(Cloudinary::option_consume($options, "flags")), ".");
        $params = array("w"=>$width, "h"=>$height, "t"=>$named_transformation, "c"=>$crop, "b"=>$background, "e"=>$effect, "bo"=>$border, "a"=>$angle, "fl"=>$flags);
        $simple_params = array("x"=>"x", "y"=>"y", "r"=>"radius", "d"=>"default_image", "g"=>"gravity",
                              "q"=>"quality", "p"=>"prefix", "l"=>"overlay", "u"=>"underlay", "f"=>"fetch_format",
                              "dn"=>"density", "pg"=>"page", "dl"=>"delay", "cs"=>"color_space");
        foreach ($simple_params as $param=>$option) {
            $params[$param] = Cloudinary::option_consume($options, $option);
        }
        $params = array_filter($params);
        ksort($params);
        $join_pair_underscore = array("Cloudinary", "join_pair_underscore");
        $transformation = implode(",", array_map($join_pair_underscore, array_keys($params), array_values($params)));
        $raw_transformation = Cloudinary::option_consume($options, "raw_transformation");
        $transformation = implode(",", array_filter(array($transformation, $raw_transformation)));
        array_push($base_transformations, $transformation);
        return implode("/", array_filter($base_transformations));
    }

    private static function join_pair_underscore($key, $value) {
        return $key . "_" . $value;
    }
    private static function join_pair_equal($key, $value) {
        return $key . "=" . $value;
    }
    private static function join_pair_equal_quoted($key, $value) {
        return $key . "='" . $value . "'";
    }
    // Warning: $options are being destructively updated!
    public static function cloudinary_url($source, &$options=array()) {
        $type = Cloudinary::option_consume($options, "type", "upload");
        if ($type == "fetch" && !isset($options["fetch_format"])) {
            $options["fetch_format"] = Cloudinary::option_consume($options, "format");
        }
        $transformation = Cloudinary::generate_transformation_string($options);
        $resource_type = Cloudinary::option_consume($options, "resource_type", "image");
        $version = Cloudinary::option_consume($options, "version");
        $format = Cloudinary::option_consume($options, "format");
        $cloud_name = Cloudinary::option_consume($options, "cloud_name", Cloudinary::config_get("cloud_name"));
        if (!$cloud_name) throw new InvalidArgumentException("Must supply cloud_name in tag or in configuration");
        $secure = Cloudinary::option_consume($options, "secure", Cloudinary::config_get("secure"));
        $private_cdn = Cloudinary::option_consume($options, "private_cdn", Cloudinary::config_get("private_cdn"));
        $secure_distribution = Cloudinary::option_consume($options, "secure_distribution", Cloudinary::config_get("secure_distribution"));
        $cdn_subdomain = Cloudinary::option_consume($options, "cdn_subdomain", Cloudinary::config_get("cdn_subdomain"));
        $cname = Cloudinary::option_consume($options, "cname", Cloudinary::config_get("cname"));
        $original_source = $source;
        if (!$source) return $original_source;
        if (preg_match("/^https?:\//i", $source)) {
          if ($type == "upload" || $type == "asset") return $original_source;
          $source = Cloudinary::smart_escape($source);
        } else if ($format) {
          $source = $source . "." . $format;
        }
        if ($secure && !$secure_distribution) {
            if ($private_cdn) {
                throw new InvalidArgumentException("secure_distribution not defined");
            } else {
                $secure_distribution = Cloudinary::SHARED_CDN;
            }
        }
        if ($secure) {
            $prefix = "https://" . $secure_distribution;
        } else {
            $crc=crc32($source);
            if ($crc<0) $crc+=4294967296;
            $subdomain = $cdn_subdomain ? "a" . (fmod($crc, 5) + 1) . "." : "";
            $host = $cname ? $cname : ($private_cdn ? $cloud_name . "-" : "") . "res.cloudinary.com";
            $prefix = "http://" . $subdomain . $host;
        }
        if (!$private_cdn) $prefix .= "/" . $cloud_name;
        return preg_replace("/([^:])\/+/", "$1/", implode("/", array($prefix, $resource_type,
         $type, $transformation, $version ? "v" . $version : "", $source)));
    }
    // Based on http://stackoverflow.com/a/1734255/526985
    private static function smart_escape($str) {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')', '%3A'=>':', '%2F'=>'/');
        return strtr(rawurlencode($str), $revert);
    }
    public static function cloudinary_api_url($action = 'upload', $options = array()) {
        $cloudinary = Cloudinary::option_get($options, "upload_prefix", Cloudinary::config_get("upload_prefix", "https://api.cloudinary.com"));
        $cloud_name = Cloudinary::config_get("cloud_name");
        if (!$cloud_name) throw new InvalidArgumentException("Must supply cloud_name in tag or in configuration");
        $resource_type = Cloudinary::option_get($options, "resource_type", "image");
        return implode("/", array($cloudinary, "v1_1", $cloud_name, $resource_type, $action));
    }
    public static function random_public_id() {
        return substr(sha1(uniqid(Cloudinary::config_get("api_secret", "") . mt_rand())), 0, 16);
    }
    public static function signed_preloaded_image($result) {
        return $result["resource_type"] . "/upload/v" . $result["version"] . "/" . $result["public_id"] .
               (isset($result["format"]) ? "." . $result["format"] : "") . "#" . $result["signature"];
    }
    public static function api_sign_request($params_to_sign, $api_secret) {
        $params = array();
        foreach ($params_to_sign as $param => $value) {
            if ($value) {
                $params[$param] = is_array($value) ? implode(",", $value) : $value;
            }
        }
        ksort($params);
        $join_pair_equal = array("Cloudinary", "join_pair_equal");
        $to_sign = implode("&", array_map($join_pair_equal, array_keys($params), array_values($params)));
        return sha1($to_sign . $api_secret);
    }
    public static function html_attrs($options) {
        ksort($options);
        $join_pair_equal_quoted = array("Cloudinary", "join_pair_equal_quoted");
        return implode(" ", array_map($join_pair_equal_quoted, array_keys($options), array_values($options)));
    }
}

class CloudinaryUploader {
   public static function build_upload_params(&$options)
   {
       $params = array("timestamp" => time(),
           "transformation" => Cloudinary::generate_transformation_string($options),
           "public_id" => Cloudinary::option_get($options, "public_id"),
           "callback" => Cloudinary::option_get($options, "callback"),
           "format" => Cloudinary::option_get($options, "format"),
           "backup" => Cloudinary::option_get($options, "backup"),
           "faces" => Cloudinary::option_get($options, "faces"),
           "exif" => Cloudinary::option_get($options, "exif"),
           "colors" => Cloudinary::option_get($options, "colors"),
           "use_filename" => Cloudinary::option_get($options, "use_filename"),
           "type" => Cloudinary::option_get($options, "type"),
           "eager" => CloudinaryUploader::build_eager(Cloudinary::option_get($options, "eager")),
           "headers" => CloudinaryUploader::build_custom_headers(Cloudinary::option_get($options, "headers")),
           "tags" => implode(",", Cloudinary::build_array(Cloudinary::option_get($options, "tags"))));
       return array_filter($params);
   }
   public static function upload($file, $options = array())
   {
       $params = CloudinaryUploader::build_upload_params($options);
       return CloudinaryUploader::call_api("upload", $params, $options, $file);
   }
   public static function destroy($public_id, $options = array())
   {
       $params = array(
           "timestamp" => time(),
           "type" => Cloudinary::option_get($options, "type"),
           "public_id" => $public_id
       );
       return CloudinaryUploader::call_api("destroy", $params, $options);
   }
   public static function explicit($public_id, $options = array())
   {
       $params = array(
           "timestamp" => time(),
           "public_id" => $public_id,
           "type" => Cloudinary::option_get($options, "type"),
           "callback" => Cloudinary::option_get($options, "callback"),
           "eager" => CloudinaryUploader::build_eager(Cloudinary::option_get($options, "eager")),
           "headers" => CloudinaryUploader::build_custom_headers(Cloudinary::option_get($options, "headers")),
           "tags" => implode(",", Cloudinary::build_array(Cloudinary::option_get($options, "tags")))
       );
       return CloudinaryUploader::call_api("explicit", $params, $options);
   }
   // options may include 'exclusive' (boolean) which causes clearing this tag from all other resources
   public static function add_tag($tag, $public_ids = array(), $options = array())
   {
       $exclusive = Cloudinary::option_get("exclusive");
       $command = $exclusive ? "set_exclusive" : "add";
       return CloudinaryUploader::call_tags_api($tag, $command, $public_ids, $options);
   }
   public static function remove_tag($tag, $public_ids = array(), $options = array())
   {
       return CloudinaryUploader::call_tags_api($tag, "remove", $public_ids, $options);
   }
   public static function replace_tag($tag, $public_ids = array(), $options = array())
   {
       return CloudinaryUploader::call_tags_api($tag, "replace", $public_ids, $options);
   }
   public static function call_tags_api($tag, $command, $public_ids = array(), &$options = array())
   {
       $params = array(
           "timestamp" => time(),
           "tag" => $tag,
           "public_ids" => Cloudinary::build_array($public_ids),
           "type" => Cloudinary::option_get($options, "type"),
           "command" => $command
       );
       return CloudinaryUploader::call_api("tags", $params, $options);
   }
   private static $TEXT_PARAMS = array("public_id", "font_family", "font_size", "font_color", "text_align", "font_weight", "font_style", "background", "opacity", "text_decoration");
   public static function text($text, $options = array())
   {
       $params = array("timestamp" => time(), "text" => $text);
       foreach (CloudinaryUploader::$TEXT_PARAMS as $key) {
           $params[$key] = Cloudinary::option_get($options, $key);
       }
       return CloudinaryUploader::call_api("text", $params, $options);
   }
   public static function call_api($action, $params, $options = array(), $file = NULL)
   {
       $return_error = Cloudinary::option_get($options, "return_error");
       $api_key = Cloudinary::option_get($options, "api_key", Cloudinary::config_get("api_key"));
       if (!$api_key) throw new InvalidArgumentException("Must supply api_key");
       $api_secret = Cloudinary::option_get($options, "api_secret", Cloudinary::config_get("api_secret"));
       if (!$api_secret) throw new InvalidArgumentException("Must supply api_secret");
       $params["signature"] = Cloudinary::api_sign_request($params, $api_secret);
       $params["api_key"] = $api_key;
       # Remove blank parameters
       $params = array_filter($params);
       $api_url = Cloudinary::cloudinary_api_url($action, $options);
       $api_url .= "?" . preg_replace("/%5B\d+%5D/", "%5B%5D", http_build_query($params));
       $ch = curl_init($api_url);
       $post_params = array();
       if ($file) {
           if (!preg_match('/^@|^https?:|^s3:|^data:[^;]*;base64,([a-zA-Z0-9\/+\n=]+)$/', $file)) {
               if (function_exists("curl_file_create")) {
                   $post_params['file'] = curl_file_create($file);
                   $post_params['file']->setPostFilename($file);
               } else {
                   $post_params["file"] = "@" . $file;
               }
           } else {
               $post_params["file"] = $file;
           }
       }
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_TIMEOUT, 60);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $post_params);
       curl_setopt($ch, CURLOPT_CAINFO,realpath(dirname(__FILE__))."/cacert.pem");
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_USERAGENT, Cloudinary::USER_AGENT);
       $response = curl_exec($ch);
       $curl_error = NULL;
       if(curl_errno($ch))
       {
           $curl_error = curl_error($ch);
       }
       $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
       $response_data = $response;
       curl_close($ch);
       if ($curl_error != NULL) {
           throw new Exception("Error in sending request to server - " . $curl_error);
       }
       if ($code != 200 && $code != 400 && $code != 500 && $code != 401 && $code != 404) {
           throw new Exception("Server returned unexpected status code - " . $code . " - " . $response_data);
       }
       $result = json_decode($response_data, TRUE);
       if ($result == NULL) {
           throw new Exception("Error parsing server response (" . $code . ") - " . $response_data);
       }
       if (isset($result["error"])) {
           if ($return_error) {
               $result["error"]["http_code"] = $code;
           } else {
               throw new Exception($result["error"]["message"]);
           }
       }
       return $result;
   }
   protected static function build_eager($transformations) {
       $eager = array();
       foreach (Cloudinary::build_array($transformations) as $trans) {
           $transformation = $trans;
           $format = Cloudinary::option_consume($tranformation, "format");
           $single_eager = implode("/", array_filter(array(Cloudinary::generate_transformation_string($transformation), $format)));
           array_push($eager, $single_eager);
       }
       return implode("|", $eager);
   }
   protected static function build_custom_headers($headers) {
       if ($headers == NULL) {
           return NULL;
       } elseif (is_string($headers)) {
           return $headers;
       } elseif ($headers == array_values($headers)) {
           return implode("\n", $headers);
       } else {
           $join_pair_colon = array("CloudinaryUploader", "join_pair_colon");
           return implode("\n", array_map($join_pair_colon, array_keys($headers), array_values($headers)));
       }
   }
   private static function join_pair_colon($key, $value) { return $key . ": " . $value; }
}