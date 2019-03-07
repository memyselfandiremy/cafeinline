<?php function ressources() {

// Chargement des styles

wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
wp_enqueue_style('responsive', get_template_directory_uri() . '/responsive.css');

// Chargement des scripts
wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js');
wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js'); 
wp_enqueue_script( 'script', get_template_directory_uri() . '/js/js.js'); 

}

add_action('wp_enqueue_scripts', 'ressources');
add_theme_support( 'post-thumbnails' );


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
if (in_array('current-menu-item', $classes) ){
$classes[] = 'active ';
}
return $classes;
}

// extrait limité
function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


?>