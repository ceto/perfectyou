<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
  ));

  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');
  //add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'  ));

  // set_post_thumbnail_size(150, 150, false);
  // add_image_size('category-thumb', 300, 9999); // 300px wide (and unlimited height)
  add_image_size('thumb169', 240, 135, true);
  add_image_size('thumb43', 240, 180, true); 
  add_image_size('medium916', 480, 853, true); 
  
  add_image_size('full43', 1600, 1200, true); 
  add_image_size('full916', 900, 1600, true); 
  
  // Add post formats (http://codex.wordpress.org/Post_Formats)
  // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
  add_theme_support('post-formats', array('aside', 'gallery', 'video'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');
