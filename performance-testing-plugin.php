<?php

    /*
        Plugin Name: Performance WordPress Testing 
        Author: VOMAkSh
    */

    require_once(plugin_dir_path(__FILE__)  . "/includes/Performance_Testing_Settings.php");

    class Performance_Testing_Plugin {

        function __construct () {
            add_action('wp_enqueue_scripts', array($this, 'attach_css_js_files'));
            
        }

        function attach_css_js_files () {
            wp_enqueue_style('styles-css-file', get_template_directory_uri() . "/css/styles.css");
            wp_enqueue_script( "main-js-file", get_template_directory_uri() . "/js/main.js", array(), "0.0.1", true );
        }

    }

    new Performance_Testing_Plugin();