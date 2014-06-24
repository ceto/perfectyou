<?php
/**
 * Custom functions
 */


/********* Custom Post Types for Treatment Management ****************/

/**
 * Treatment Custom Post Type Definition
*/
function create_treatment() {
  $labels = array(
    'name' => 'Kezelések',
    'singular_name' => 'Kezelés',
    'add_new' => 'Új hozzáadása',
    'add_new_item' => 'Új kezelés felvétele',
    'edit_item' => 'Kezelés szerkesztése',
    'new_item' => 'Új kezelés',
    'all_items' => 'Összes kezelés',
    'view_item' => 'Kezelés megtekintése',
    'search_items' => 'Kezelések keresése',
    'not_found' =>  'Nincs találat',
    'not_found_in_trash' => 'Nincs találat a lomtárban', 
    'parent_item_colon' => 'parent_item_colon',
    'menu_name' => 'Kezelések'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'kezeles' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'yarpp_support' => true,
    'supports' => array( 'title', 'editor', 'thumbnail' )
  ); 

  register_post_type( 'kezeles', $args );
}
add_action( 'init', 'create_treatment' ); 

/********* END OF Custom Post Types for Treatment Management ****************/


/********* Custom MetaBoxes for Treatment Management ****************/

/**
 * Treatment Metaboxes
*/
add_filter( 'cmb_meta_boxes', 'cmb_treatment' );
function cmb_treatment( array $meta_boxes ) {
  $prefix = '_meta_';

  /**
  * Repeatable Field Groups
  */
  $meta_boxes[] = array(
    'id'         => 'kmeta',
    'title'      => 'További tartalmak',
    'pages'      => array( 'kezeles','page' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      
      array(
        'name' => 'Lead',
        'id'   => $prefix . 'lead',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 15, 'wpautop' => true ),
      ),
      array(
        'name' => 'Szlogen, idézet',
        'id'   => $prefix . 'slogan',
        'type' => 'text',
      ),

      array(
        'name' => 'Teljesképernyős háttérkép',
        'desc' => 'Upload an image or enter a URL. (min: 1920×1280px)',
        'id'   => $prefix . 'wallimg',
        'type' => 'file',
        'save_id' => true, // save ID using true
        'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
      ),

      array(
        'id'          => $prefix . 'sections',
        'type'        => 'group',
        'description' => 'Horgonyozható fejezetek',
        'options'     =>  array(
                            'add_button'    => 'Új fejezet felvétele',
                            'remove_button' => 'Fejezet eldobása',
                            'sortable'      => true, // beta
        ),
        // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
        'fields'      => array(
            array(
              'name' => 'Alfejezet címe',
              'id'   => 'title',
              'type' => 'text',
            ),
            array(
              'name'    => 'Fejezet szövege',
              'id'      => 'content',
              'type'    => 'wysiwyg',
              'options' => array( 'textarea_rows' => 15, 'wpautop' => true ),
            ),
            array(
              'name' => 'Háttér/oldal kép a fejezethez',
              'desc' => 'Upload an image or enter a URL. (min: 1920×1280px)',
              'id'   => 'ill',
              'type' => 'file',
              'save_id' => true, // save ID using true
              'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ),
        ),
      ),
    ),
  );


  return $meta_boxes;
}

/********* End of Custom MetaBoxes for Treatment Management ****************/

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'cmb/init.php';

}

/******** Category Taxonomy Meta Boxes Definition *********/
require_once("Tax-meta-class/Tax-meta-class.php");
if (is_admin()){
  /* 
   * prefix of meta keys, optional
   */
  $prefix = 'ba_';
  /* 
   * configure your meta box
   */
  $config = array(
    'id' => 'category_meta',          // meta box id, unique per meta box
    'title' => 'Category Meta Box',          // meta box title
    'pages' => array('category'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  
  /*
   * Initiate your meta box
   */
  $cat_meta =  new Tax_Meta_Class($config);
  
  /*
   * Add fields to your meta box
   */
  
  //Image field
  $cat_meta->addImage($prefix.'image_field_id',array('name'=> __('Fullscreen image(min:1600×1200px)','roots')));

  //file upload field
  //$repeater_fields[] = $my_meta->addImage($prefix.'image_field_id',array('name'=> __('My Image ','tax-meta')),true);
  
  /*
   * Then just add the fields to the repeater block
   */
  //repeater block
  $cat_meta->addRepeaterBlock($prefix.'re_',array('inline' => true, 'name' => __('This is a Repeater Block','tax-meta'),'fields' => $repeater_fields));
  
  /*
   * Don't Forget to Close up the meta box decleration
   */
  //Finish Meta Box Decleration
  $cat_meta->Finish();
}



// add tag & category support to pages
function py_tagcat_support_all() {
  register_taxonomy_for_object_type('post_tag', 'page');
  register_taxonomy_for_object_type('post_tag', 'kezeles');
  register_taxonomy_for_object_type('category', 'page');
  register_taxonomy_for_object_type('category', 'kezeles');
}

// ensure all tags are included in queries
function py_tagcat_support_query($wp_query) {
  if ( ( $wp_query->get('tag') || $wp_query->get('cat') ) &&  $wp_query->is_main_query() ){
    $wp_query->set('post_type', array('post','page'));
  } 
}

// tag hooks
add_action('init', 'py_tagcat_support_all');
add_action('pre_get_posts', 'py_tagcat_support_query');


// add_action('pre_get_posts','alter_query');
 
// function alter_query($query) {
//     //gets the global query var object
//     global $wp_query;
 
//     //gets the front page id set in options
//     $front_page_id = get_option('page_on_front');
 
//     if ( 'page' != get_option('show_on_front') || $front_page_id != $wp_query->query_vars['page_id'] )
//         return;
 
//     if ( !$query->is_main_query() )
//         return;
 
//     $query-> set('post_type' ,'page');
//     $query-> set('post__in' ,array( $front_page_id , [YOUR SECOND PAGE ID]  ));
//     $query-> set('orderby' ,'post__in');
//     $query-> set('p' , null);
//     $query-> set( 'page_id' ,null);
 
//     //we remove the actions hooked on the '__after_loop' (post navigation)
//     remove_all_actions ( '__after_loop');
// }


// add_filter('the_content', 'py_fix_shortcodes');
// // Intelligently remove extra P and BR tags around shortcodes that WordPress likes to add
// function py_fix_shortcodes($content){   
//     $array = array (
//         '<p>[' => '[', 
//         ']</p>' => ']', 
//         ']<br />' => ']'
//     );
//     $content = strtr($content, $array);
//     return $content;
// }

// # Deregister style file
// function py_remove_wpss_styles() {
//   if(!is_admin()){ 
//     wp_deregister_style( 'wpss-style' );
//     wp_deregister_style( 'wpss-custom-db-style' );
//   }
// }
// add_action( 'wp_print_styles', 'py_remove_wpss_styles', 100 );

// # Deregister scripts file

# Deregister style files
function py_DequeueYarppStyle()
{
  wp_dequeue_style('yarppRelatedCss');
  wp_deregister_style('yarppRelatedCss');
}
add_action('wp_footer', py_DequeueYarppStyle);

function py_remove_scripts () {
  if(!is_admin()){ 
    wp_deregister_script('bootstrap-shortcodes-tooltip');
    wp_deregister_script('bootstrap-shortcodes-popover');
  }
}
add_action('wp_print_scripts', 'py_remove_scripts', 11);


