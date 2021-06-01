<?php

//  ----------------------------------------
//  LOADING STYLES
//  ----------------------------------------

function my_custom_styles() {

    $style_version = 'v1.0.3'; // style version
    $deps = array();

    wp_enqueue_style( 'owlcarousel-style',         get_template_directory_uri() . "/assets/css/owlcarousel/owl.carousel.min.css",               $deps, $style_version );
    wp_enqueue_style( 'owlcarousel-theme-style',   get_template_directory_uri() . "/assets/css/owlcarousel/owl.theme.default.min.css",          $deps, $style_version );
    wp_enqueue_style( 'bootstrap-style',           'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',                  $deps, $style_version );
    wp_enqueue_style( 'font-awsome-style',         'https://use.fontawesome.com/releases/v5.3.1/css/all.css',                                   $deps, $style_version );
    wp_enqueue_style( 'font-awsome-style2',        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',                                   $deps, $style_version );
    wp_enqueue_style( 'font-exo2',                 'https://fonts.googleapis.com/css?family=Exo+2:400,400i,600,600i&display=swap&subset=latin-ext',        $deps, $style_version );
    wp_enqueue_style( 'open-sans',                 'https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext',           $deps, $style_version );
    wp_enqueue_style( 'my-custom-style',           get_template_directory_uri() . "/assets/css/style.css",                                      $deps, $style_version );
//    wp_enqueue_style( 'lightbox-style',            get_template_directory_uri() . "/assets/lightbox/css/lightbox.css",                          $deps, $style_version );
    wp_enqueue_style( 'fancybox-style',            get_template_directory_uri() . "/assets/js/fancybox/jquery.fancybox.min.css",                              $deps, $style_version );

}

add_action( 'wp_enqueue_scripts', 'my_custom_styles' );


//  ----------------------------------------
//  LOADING SCRIPTS
//  ----------------------------------------

function my_custome_scipts() {
  
    $script_version = 'v1.0.0';
    $deps = array();

    wp_enqueue_script( 'bootstrap-stylejs',       'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',       $deps,                               $script_version,    false);
    wp_enqueue_script( 'eob-owl-min',             get_template_directory_uri() . "/assets/js/owlcarousel/owl.carousel.min.js",    array('jquery'),                     $script_version,    false);
    wp_enqueue_script( 'eob-lazyload',            get_template_directory_uri() . "/assets/js/jquery.lazy.min.js",                 array('jquery'),                     $script_version,    false);
    wp_enqueue_script( 'eob-script',              get_template_directory_uri() . "/assets/js/script.js",                          array( 'jquery', 'eob-lazyload' ),   $script_version,    false);
//    wp_enqueue_script( 'lightbox-js',             get_template_directory_uri() . "/assets/lightbox/js/lightbox.js",               array('jquery'),                     $script_version,    false);
    wp_enqueue_script( 'fancybox-js',             get_template_directory_uri() . "/assets/js/fancybox/jquery.fancybox.min.js",    array('jquery'),                     $script_version,    false);

}

add_action( 'wp_enqueue_scripts', 'my_custome_scipts' );


//  ----------------------------------------
//  REGISTER MENU
//  ----------------------------------------

function register_jrw_menu() {
    register_nav_menus(
        array(
            'top-menu'              => __( 'Menu top' ),
            'footer-menu'           => __( 'Footer top' )
        )
    );
}


add_action( 'after_setup_theme', 'register_jrw_menu' );

//  ----------------------------------------
//  Filters for Breadcrumb WP TMC
//  ----------------------------------------


add_filter('changeSeparatorTMC', function ($sep) {

    $sep = '<i class="fa fa-angle-right px-1 color-2" aria-hidden="true"></i>
';
    return $sep;

});

add_filter('changeHomeTitleTMC', function ($sep) {

    $sep =  'Strona główna';
    return $sep;

});


//  ----------------------------------------
//  Thumbnail support
//  ----------------------------------------


function thumbnail_theme_setup() {

    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'thumbnail_theme_setup' );



//  ----------------------------------------
//  Custom post types
//  ----------------------------------------

/**
 * Called on init.
 *
 * @return void
 */
function jrw_register_post_types() {

    register_post_type( 'jrw-referencje', array(
        'label'             =>  'referencje',
        'labels'            =>  array(
            'name'              =>  __('Referencje',        'jrw-master'),
            'singular_name'     =>  __('Referencje',        'jrw-master'),
            'add_new'           =>  __('Dodaj nowe',        'jrw-master'),
            'all_items'         =>  _x('Wszystkie referencje',   'lista referencji'  ,   'jrw-master'),
            'add_new_item'      =>  __('Dodaj nowe',        'jrw-master'),
            'edit_item'         =>  __('Edytuj wpis',       'jrw-master'),
            'new_item'          =>  __('Nowy wpis',         'jrw-master'),
            'view_item'         =>  __('Zobacz wpis',       'jrw-master'),
            'view_items'        =>  __('Zobacz wpisy',      'jrw-master'),
            'search_items'      =>  __('Szukaj hasła',      'jrw-master')
        ),
        'public'            =>  true,
        'menu_position'     =>  6,
        'supports'          =>  array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions','author' ),
        'has_archive'       =>  true,
        'menu_icon'         =>  'dashicons-format-aside',
        'rewrite'           =>  array(
            'slug'              =>  'referencje'
        ),
    ) );

    register_post_type( 'jrw-realizacje', array(
        'label'             =>  'realizacje',
        'labels'            =>  array(
            'name'              =>  __('Realizacje',            'jrw-master'),
            'all_items'         =>  _x('Wszystkie realizacje',  'lista realizacji' , 'jrw-master'),
            'singular_name'     =>  __('Realizacje',            'jrw-master'),
            'add_new'           =>  __('Dodaj nową',            'jrw-master'),
            'add_new_item'      =>  __('Dodaj nowe',            'jrw-master'),
            'edit_item'         =>  __('Edytuj realizację',     'jrw-master'),
            'new_item'          =>  __('Nowa realizacja',       'jrw-master'),
            'view_item'         =>  __('Zobacz wpis',           'jrw-master'),
            'view_items'        =>  __('Zobacz wpisy',          'jrw-master'),
            'search_items'      =>  __('Szukaj realizacji',     'jrw-master')
        ),
        'public'            =>  true,
        'menu_position'     =>  6,
        'supports'          =>  array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions','author' ),
        'has_archive'       =>  true,
        'menu_icon'         => 'dashicons-format-gallery',
        'rewrite'           =>  array(
            'slug'              =>  'realizacje'
        ),
    ) );

    register_post_type( 'partnerzy', array(
        'label'             =>  'partnerzy',
        'labels'            =>  array(
            'name'              =>  __('Partnerzy',          'jrw-master'),
            'all_items'         =>  _x('Wszyscy partnerzy',  'lista partnerów', 'jrw-master'),
            'singular_name'     =>  __('Partner',            'jrw-master'),
            'add_new'           =>  __('Dodaj partnera',     'jrw-master'),
            'add_new_item'      =>  __('Dodaj partnera',     'jrw-master'),
            'edit_item'         =>  __('Edytuj partnera',    'jrw-master'),
            'new_item'          =>  __('Nowy partner',       'jrw-master'),
            'view_item'         =>  __('Zobacz partnera',    'jrw-master'),
            'view_items'        =>  __('Zobacz partnerów',   'jrw-master'),
            'search_items'      =>  __('Szukaj partnerów',   'jrw-master')
        ),
        'public'                =>  true,
        'menu_position'         =>  6,
        'supports'              =>  array( 'title', 'thumbnail'),
        'has_archive'           =>  true,
        'menu_icon'             => 'dashicons-groups',
        'rewrite'               =>  array(
            'slug'              =>  'partnerzy'
        ),
    ) );

}

add_action( 'init', 'jrw_register_post_types' );

function breadcrumbTmcHome($homeTxt){

    $homeTxt = 'Strona główna';
    return $homeTxt;
}
add_filter('breadcrumbTmc/homeLabel', 'breadcrumbTmcHome');


add_filter( 'breadcrumbTmc/lastNode', function( $node ){
    if( $node ){
        $node->setTag( 'span' );
    }
    return $node;
} );


function current_paged( $var = '' ) {
if( empty( $var ) ) {
    global $wp_query;
    if( !isset( $wp_query->max_num_pages ) )
        return;
    $pages = $wp_query->max_num_pages;
}
else {
    global $$var;
        if( !is_a( $$var, 'WP_Query' ) )
            return;
    if( !isset( $$var->max_num_pages ) || !isset( $$var ) )
        return;
    $pages = absint( $$var->max_num_pages );
}
if( $pages <= 1 )
    return;
    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    echo '<p class="header-3 mb-2 mb-lg-0 font-weight-bold">Strona ' . $page . ' z ' . $pages . '</p>';
}
