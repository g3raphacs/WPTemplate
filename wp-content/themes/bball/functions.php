<?php

function lejee_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post_thumbnails');
}

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
//activate thumbnails
function lejee_post_thumbnails()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'lejee_post_thumbnails');

//load scripts and styles
add_action('after_setup_theme', 'lejee_supports');
add_action('wp_enqueue_scripts', 'lejee_register_styles');

// FILTERS--------------------------------------------------------------------------------
// Delete description in title
function lejee_document_title_parts($title)
{
    unset($title['tagline']);
    return $title;
}
add_filter('document_title_parts', 'lejee_document_title_parts');

// Filter except length to 35 words.
function tn_custom_excerpt_length($length)
{
    return 24;
}
add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);
