<?php

    class Performance_Testing_Plugin_Settings {

        function __construct () {
            add_action('admin_menu', array($this, 'create_options_menu'));
            add_action('admin_init', array($this, 'create_options_settings_entries'));
        }

        function create_options_menu () {
            add_options_page(
                "Performance Testing",
                "Performance Testing",
                "manage_options",
                "performance_testing",
                array($this, 'create_options_settings_form')
            );
        }

        function create_options_settings_entries () {
            register_setting( "performance_testing_group", "performance_testing_settings");
            add_settings_section(
                "performance_testing_section_one",
                "Performance Testing Plugin Settings",
                array($this, "performance_testing_section_one_callback"),
                "performance_testing_group"
            );
            add_settings_field(
                "performance_testing_api_url",
                "API Url",
                array($this, "render_api_url_field"),
                "performance_testing_group",
                "performance_testing_section_one"
            );
            add_settings_field(
                "performance_testing_api_email",
                "Email",
                array($this, "render_api_email"),
                "performance_testing_group",
                "performance_testing_section_one"
            );
            add_settings_field(
                "performance_testing_api_password",
                "Password",
                array($this, "render_api_password"),
                "performance_testing_group",
                "performance_testing_section_one"
            );
        }

        function performance_testing_section_one_callback () {
            echo "";
        }

        function render_api_url_field () {
            $options = get_option( "performance_testing_settings" );
            ?>
            <input type="text" name="performance_testing_settings[performance_testing_api_url]" value="<?php echo $options["performance_testing_api_url"] ?>">
            <?php
        }

        function render_api_email () {
            $options = get_option("performance_testing_settings");
            ?>
            <input type="text" name="performance_testing_settings[performance_testing_api_email]" value="<?php echo $options["performance_testing_api_email"] ?>">
            <?php
        }

        function render_api_password () {
            $options = get_option("performance_testing_settings");
            ?>
            <input type="password" name="performance_testing_settings[performance_testing_api_password]" value="<?php echo $options["performance_testing_api_password"] ?>">
            <?php
        }

        function create_options_settings_form () {
            ?>
            <form method="POST" action="options.php">
                <?php
                    settings_fields( "performance_testing_group" );
                    do_settings_sections( "performance_testing_group" );
                    submit_button();
                ?>
            </form>
            <?php
        }

    }

    new Performance_Testing_Plugin_Settings();

?>