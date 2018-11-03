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

function add_custom_menu() {
    register_nav_menu('header-menu',__( 'Header Menu (Custom)' ));
}

add_action( 'init', 'add_custom_menu');
