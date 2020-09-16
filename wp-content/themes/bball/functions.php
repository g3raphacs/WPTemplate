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
//init
function lejee_init(){
    //taxonomies
    register_taxonomy('equipe', 'post',[
        'labels' => [
            'name' => 'Equipe',
            'singular_name'=> 'Equipe',
            'plural_name'=> 'Equipes',
            'search_items'=> 'Rechercher des Equipes',
            'all_items'=> 'Toutes les Equipes',
            'edit_item'=> "Editer l'Equipe",
            'update_item'=> "Mettre à jour l'Equipe",
            'add_new_item'=> 'Ajouter une Equipe',
            'new_item_name'=> 'Ajouter une Equipe',
            'menu_name'=> 'Equipe',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);
    //post types
    register_post_type('video',[
        'label' => 'Vidéo',
        'public' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-format-video',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);
}
add_action('init','lejee_init');

//add image size
add_image_size('card_thumbnail', 350,215,true);
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

//metaboxes
require_once('metaboxes/sponso.php');
SponsoMetaBox::register();

//options
require_once('options/bballnews.php');
BballMenuPage::register();

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

//paging--------------------------------------------------------------
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

//Add columns in admin panel
add_filter('manage_posts_columns',function($columns){
    return [
        'cb' => $columns['cb'],
        'thumbnail' => 'Miniature',
        'title' => $columns['title'],
        'date' => $columns['date']
    ];
});

add_filter('manage_posts_custom_column', function($column ,$postId ){
    if ($column === 'thumbnail') {
        the_post_thumbnail('thumbnail', $postId);
    }
}, 10, 2);

add_action('admin_enqueue_scripts', function (){
    wp_enqueue_style('admin_lejee', get_template_directory_uri().'/assets/css/admin.css');
});

add_filter('manage_post_posts_columns',function($column){
    $newColumns = [];
    foreach($column as $k => $v){
        if($k === 'date'){
            $newColumns['sponso'] = 'Article sponsorisé ?';
        }
        $newColumns[$k] = $v;
    }
    return $newColumns;
});

add_filter('manage_post_posts_custom_column', function($column ,$postId ){
    if ($column === 'sponso') {
        if(!empty(get_post_meta($postId, SponsoMetaBox::META_KEY, true))){
            $class = 'yes';
        } else {
            $class = 'no';
        }
        echo '<div class="bullet bullet-'.$class.'"></div>';
    }
}, 10, 2);

//exclude pages from search (only for visitors)
add_action('pre_get_posts','exclude_all_pages_search');
function exclude_all_pages_search($query) {
    if (
        ! is_admin()
        && $query->is_main_query()
        && $query->is_search
        && !is_user_logged_in()
    ){
        $query->set( 'post_type', ['post','video'] );
    }
}

//custom WP loop

function lejee_pre_get_posts ($query){
    if(is_admin() || !is_home() || !$query->is_main_query()){
        return;
    }
    if(get_query_var('sponso') === '1'){
        $meta_query = $query->get('meta_query',[]);
        $meta_query[] = [
        'key' => SponsoMetaBox::META_KEY,
        'compare' => 'EXISTS',
        ];
        $query->set('meta_query', $meta_query);
    }
}

function lejee_query_vars($params){
    $params[] = 'sponso';
    return $params;
}

add_filter('query_vars', 'lejee_query_vars');
add_action('pre_get_posts', 'lejee_pre_get_posts');

//sidebar
function lejee_register_widget(){
    register_sidebar([
        'id' => 'homepage',
        'name' => 'Sidebar Accueil',
    ]);
}

add_action('widgets_init', 'lejee_register_widget');