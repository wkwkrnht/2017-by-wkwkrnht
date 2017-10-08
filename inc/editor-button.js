(function() {
    tinymce.create('tinymce.plugins.css_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('css', {
                title: 'custom css',
                icon: 'code',
                cmd: 'css_cmd'
            });
            ed.addCommand('css_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[customcss]' + selected_text + '[/customcss]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.css_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.html_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('html', {
                title: 'html_encode',
                icon: 'code',
                cmd: 'html_cmd'
            });
            ed.addCommand('html_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[html_encode]' + selected_text + '[/html_encode]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.html_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.embedly_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('embedly', {
                title: 'embedly',
                icon: 'code',
                cmd: 'embedly_cmd'
            });
            ed.addCommand('embedly_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[embedly url=' + selected_text + ' ]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.embedly_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.hatena_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('hatena', {
                title: 'hatena blog card',
                icon: 'code',
                cmd: 'hatena_cmd'
            });
            ed.addCommand('hatena_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[hatenaBlogcard url=' + selected_text + ' ]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.hatena_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.OGP_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('OGP', {
                title: 'OGP blog card',
                icon: 'code',
                cmd: 'OGP_cmd'
            });
            ed.addCommand('OGP_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[OGPBlogcard url=' + selected_text + ' ]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.OGP_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.spotify_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('spotify', {
                title: 'spotify embed',
                icon: 'code',
                cmd: 'spotify_cmd'
            });
            ed.addCommand('spotify_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[spotify url=' + selected_text + ' ]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.spotify_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.mastodon_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('mastodon', {
                title: 'mastodon embed',
                icon: 'code',
                cmd: 'mastodon_cmd'
            });
            ed.addCommand('mastodon_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[mastodon url=' + selected_text + ' ]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.mastodon_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.nav_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('nav', {
                title: 'navigation',
                icon: 'code',
                cmd: 'nav_cmd'
            });
            ed.addCommand('nav_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[nav id=' + selected_text + ' ]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.nav_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.adsense_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('adsense', {
                title: 'adsense',
                icon: 'code',
                cmd: 'adsense_cmd'
            });
            ed.addCommand('css_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[adsense client=' + selected_text + ' slot= ]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.adsense_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.before_after_box_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('before_after', {
                title: 'before_after_box',
                icon: 'code',
                cmd: 'before_after_box_cmd'
            });
            ed.addCommand('before_after_box_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[before_after_box before=' + selected_text + ' after= ]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.before_after_box_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.columun_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('columun', {
                title: 'columun',
                icon: 'code',
                cmd: 'columun_cmd'
            });
            ed.addCommand('columun_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[columun title= color= ]' + selected_text + '[/columun]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.columun_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.info_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('info', {
                title: 'info',
                icon: 'code',
                cmd: 'info_cmd'
            });
            ed.addCommand('info_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[info]' + selected_text + '[/info]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.info_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.qa_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('qa', {
                title: 'qa',
                icon: 'code',
                cmd: 'qa_cmd'
            });
            ed.addCommand('qa_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[qa]' + selected_text + '[/qa]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.qa_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.search-box_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('search', {
                title: 'search-box',
                icon: 'code',
                cmd: 'search-box_cmd'
            });
            ed.addCommand('search-box_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[search-box]' + selected_text + '[/search-box]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.search-box_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.simple_box_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('simple', {
                title: 'simple-box',
                icon: 'code',
                cmd: 'simple-box_cmd'
            });
            ed.addCommand('simple-box_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[simple-box color= ]' + selected_text + '[/simple-box]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.simple_box_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.box_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('box', {
                title: 'box',
                icon: 'code',
                cmd: 'box_cmd'
            });
            ed.addCommand('box_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[box color= ]' + selected_text + '[/box]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.box_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.link_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('link', {
                title: 'link',
                icon: 'code',
                cmd: 'link_cmd'
            });
            ed.addCommand('link_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[link url= ]' + selected_text + '[/link]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.link_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.marker_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('marker', {
                title: 'marker',
                icon: 'code',
                cmd: 'marker_cmd'
            });
            ed.addCommand('marker_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[marker]' + selected_text + '[/marker]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.marker_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.link_button_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('_link', {
                title: 'link_button',
                icon: 'code',
                cmd: 'link_button_cmd'
            });
            ed.addCommand('link_button_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[link_button color= ]' + selected_text + '[/link_button]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.link_button_shortcode_button );
})();


(function() {
    tinymce.create('tinymce.plugins.toc_shortcode_button', {
        init: function( ed, url ) {
            ed.addButton('toc', {
                title: 'toc',
                icon: 'code',
                cmd: 'toc_cmd'
            });
            ed.addCommand('toc_cmd', function() {
                var selected_text = ed.selection.getContent(),
                return_text = '[toc]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function( n, cm ) {
            return null;
        },
    });
    tinymce.PluginManager.add('wkwkrnht_shortcode_button_plugin', tinymce.plugins.toc_shortcode_button );
})();