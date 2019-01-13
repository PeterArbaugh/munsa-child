<?php
/**
 * This is child themes functions.php file. All modifications should be made in this file.
 *
 * All style changes should be in child themes style.css file.
 *
 * @package    Munsa child
 * @version    1.0.0
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @copyright  Copyright (c) 2015, Sami Keijonen
 * @link       https://foxland.fi
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Setup function.  All child themes should run their setup within this function. The idea is to add/remove 
 * filters and actions after the parent theme has been set up.  This function provides you that opportunity.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function munsa_child_theme_setup() {

	/* Load child theme text domain. */
	load_child_theme_textdomain( 'munsa-child', get_stylesheet_directory() . '/languages' );
	
}
add_action( 'after_setup_theme', 'munsa_child_theme_setup', 11 );

/**
 * PFA: Add main menu to home page.  Saves a click. ;)
 */
function add_custom_menu() {
    register_nav_menu('header-menu',__( 'Header Menu (Custom)' ));
}

add_action( 'init', 'add_custom_menu');

/**
 * PFA: Add custom post type "Project" to highlight case studies and create custom post display.
 * Copied from https://www.smashingmagazine.com/2012/11/complete-guide-custom-post-types/
 * 
 * Warning: Use of undefined constant ’ - assumed '’' (this will throw an Error in a future version of PHP) in /app/public/wp-content/themes/munsa-child/functions.php on line 57

 */
function pfa_post_type_project() {
	$labels = array(
	  'name'               => _x( 'Projects', 'post type general name' ),
	  'singular_name'      => _x( 'Project', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'book' ),
	  'add_new_item'       => __( 'Add New Project' ),
	  'edit_item'          => __( 'Edit Project' ),
	  'new_item'           => __( 'New Project' ),
	  'all_items'          => __( 'All Projects' ),
	  'view_item'          => __( 'View Project' ),
	  'search_items'       => __( 'Search Projects' ),
	  'not_found'          => __( 'No Projects found' ),
	  'not_found_in_trash' => __( 'No Projects found in the Trash' ), 
	  'parent_item_colon'  => '’',
	  'menu_name'          => 'Projects'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds our projects and project specific data',
	  'public'        => true,
	  'menu_position' => 5,
	  'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
	  'has_archive'   => true,
	  'capability_type' => 'post',
	  'show_in_rest' => true
	);
	register_post_type( 'Project', $args ); 
  }
  add_action( 'init', 'pfa_post_type_project' );