<?php
/*
    TEST code
1.
2.
3.
*/
class ShortCodeTest extends PHPUnit_Framework_TestCase{
    function testhatenaembed(){
        $output = do_shortcode('[hatenablogcard url=https://wkwkrnhtht.wordpress.com]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testembedly(){
        $output = do_shortcode('[embedly url=https://wkwkrnhtht.wordpress.com]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testOGPembed(){
        $output = do_shortcode('[OGPblogcard url=https://wkwkrnhtht.wordpress.com]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testtoc(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testspotify(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testoot(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testtwitterlink(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testmarker(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testsimplebox(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testnoticebox(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testquestionbox(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testserachbox(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testcolumunbox(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testbox(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testlinkbutton(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testlink(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testbeforeafter(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
    function testlinktext(){
        $output = do_shortcode('[mymitsu]https://my-mitsu.jp/estimation/292[/mymitsu]');
        $expected = '<iframe src="https://my-mitsu.jp/estimation/292" id="mymitsu" width="640" height="480"></iframe>';
        $this->assertEquals($output, $expected);
    }
}