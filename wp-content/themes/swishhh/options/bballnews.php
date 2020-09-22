<?php
class BballMenuPage {

    const GROUP = 'bballnews_options';

    public static function register(){
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
        add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }

    public static function registerScripts($suffix){
        if($suffix === 'settings_page_bballnews_options'){
            wp_register_style('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', [], false);
            wp_register_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', [], false, true);
            wp_register_script('bball_admin', get_template_directory_uri().'/assets/js/admin.js', ['flatpickr'], false, true);
            wp_enqueue_style('flatpickr');
            wp_enqueue_script('bball_admin');
        }
    }

    public static function registerSettings(){
        register_setting(self::GROUP, 'bball_test_option', ['default' => 'salut']);
        add_settings_section('bball_options_section', 'Paramètres', function(){
            echo 'Vous pouvez ici gerer les parametres du site BBall News';
        }, self::GROUP);
        add_settings_field('bball_option_test', 'Option de test:', function(){
            ?>
                <textarea name="bball_test_option" id="" cols="30" rows="10" style="width: 100%;"><?= esc_html(get_option('bball_test_option')) ?></textarea>
            <?php
        }, self::GROUP, 'bball_options_section');
    }

    public static function addMenu(){
        add_options_page('Gestion de BBall News', 'BBall News', 'manage_options', self::GROUP, [self::class, 'render']);
    }

    public static function render(){
        ?>
        <h1>Gestion de BBall News</h1>

        <form action="options.php" method="post">
        <?php
        settings_fields(self::GROUP);
        do_settings_sections(self::GROUP);
        submit_button();
        ?>
        </form>
        <?php
    }
}