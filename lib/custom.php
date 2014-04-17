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
    'pages'      => array( 'kezeles', ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      
      array(
        'name' => 'Szlogenszerű alcím',
        'id'   => $prefix . 'subtitle',
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
        ),
      ),
    ),
  );


  return $meta_boxes;
}

/********* End of Custom MetaBoxes for Treatment Management ****************/

/************* Custom Category for Treatment Management *********/

add_action( 'init', 'create_treatment_category', 0 );

function create_treatment_category() {
  $labels = array(
    'name'              => 'Kezelés csoportok',
    'singular_name'     => 'Kezelés csoport',
    'menu_name'         => 'Kezelés csoportok',
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'kezeles-csoport' ),
  );

  register_taxonomy( 'kezeles-csoport', array( 'kezeles' ), $args );
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'cmb/init.php';

}