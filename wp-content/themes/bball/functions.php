<?php


function lejee_register_styles()
{
    wp_register_style(
        'bootstrap',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'
    );
    wp_register_script(
        'bootstrap',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js',
        ['popper', 'jquery'],
        false,
        true
    );
    wp_deregister_script('jquery');
    wp_register_script(
        'jquery',
        'https://code.jquery.com/jquery-3.5.1.slim.min.js',
        [],
        false,
        true
    );
    wp_register_script(
        'popper',
        'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js',
        [],
        false,
        true
    );
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

// HOOKS----------------------------------------------------------------------------------
// THEME SUPPORTS
//activate title tag
function lejee_title_tag()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'lejee_title_tag');
//activate menus
function lejee_menus()
{
    add_theme_support('menus');
    register_nav_menu('header','en tête du menu');
    register_nav_menu('footer','pied de page');
}
add_action('after_setup_theme', 'lejee_menus');
// activate thumbnails
function lejee_post_thumbnails()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'lejee_post_thumbnails');

//load scripts and styles
add_action('wp_enqueue_scripts', 'lejee_register_styles');

// FILTERS--------------------------------------------------------------------------------
// Delete description in title
function lejee_document_title_parts($title)
{
    unset($title['tagline']);
    return $title;
}
add_filter('document_title_parts', 'lejee_document_title_parts');

// Filter excerpt length to 24 words.
function tn_custom_excerpt_length()
{
    return 24;
}
add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);


//menu
function lejee_menu_class($classes){
    $classes[] = 'nav-item';
    return $classes;
}
function lejee_menu_link_class($attrs){
    $attrs['class'] = 'nav-link';
    return $attrs;
}
add_filter('nav_menu_css_class', 'lejee_menu_class');
add_filter('nav_menu_link_attributes', 'lejee_menu_link_class');

//pagination
function lejee_pagination(){
    $pages = paginate_links(['type'=>'array']);
    if($pages === null){return;}
    echo '<nav aria-label="Pagination">';
        echo '<ul class="pagination">';
        foreach($pages as $page){
            $active = strpos($page, 'current') !== false;
            $class = 'page-item';
            if($active){
                $class .= ' active';
            }
            echo '<li class="'.$class.'">';
            echo str_replace('page-numbers', 'page-link',$page);
            echo '</li>';
        }
        echo '</ul>';
    echo '</nav>';
}
