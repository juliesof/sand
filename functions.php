<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

  // Get the theme data
  $the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
  wp_enqueue_script( 'popper-scripts', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), false);
  wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
  }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// Add ACF Options
if( function_exists('acf_add_options_page') ) {
 
  // Store Hours
  $option_page = acf_add_options_page(array(
    'page_title'      => 'Store Hours',
    'position'        => '51.3',
    'icon_url'        => 'dashicons-calendar-alt',
    'updated_message' => __("Store Hours Updated", 'acf'),
    'update_button'   => __("Update Hours", 'acf'),
    'redirect'        => false,
  ));
 
}

// Add included files

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

$child_includes = array(
  '/cb-custom-image-sizes.php',   // Load image srcset
  '/enqueue.php',                 // Child enqueue
  '/custom-fields.php'            // ACF
  //'/cb-functions.php'             // Custom PHP functions
);

foreach ( $child_includes as $file ) {
  $filepath = get_stylesheet_directory() . '/inc' . $file ;
  if ( ! $filepath ) {
      trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
  }
  require_once $filepath;
}
?>
