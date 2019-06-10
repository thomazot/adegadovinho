<?php
if(!defined('THEMENAME')) { define('THEMENAME', 'zot'); }

/*
Plugin Name: Zot
Description: My Zot personal plugin
*/

/**
 * Configs
 */

include 'zotConfig.php';

/**
 * Widgets
 */

include 'zotWidget.php';

/**
 * Functions 
 */
include "includes/zotFunctions.php";
include "includes/zotLogo.php";
include "includes/zotMenu.php";
include "includes/zotBanner.php";
include "includes/zotWidget.php";
include "includes/zotProducts.php"; 
include "includes/zotPosts.php"; 
include "includes/zotCases.php"; 
include "includes/zotPagination.php"; 
include "includes/zotPartners.php"; 
include "includes/maislidos.php"; 
include "includes/breadcrumb.php"; 

/**
 * Create Type Posts
 */
include "createposts/banner.php";
// include "createposts/cases.php";
// include "createposts/partners.php";
// include "createposts/product.php";

/**
 * Customizer
 */
include "zotCustomizer.php";
include "customizer/zotAbout.php";


// add_action( 'admin_enqueue_scripts', 'wpmidia_enqueue_color_picker' );
// function wpmidia_enqueue_color_picker( $hook_suffix ) {
//     if(is_admin()) {
//         wp_enqueue_style( 'zot-admin-style', plugins_url('style.css', __FILE__ ));
//         wp_enqueue_style( 'wp-color-picker' );
//         wp_enqueue_script( 'color-picker-script', plugins_url('scripts.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
//     }
// }

// add_action('admin_menu', 'my_menu');
// function my_menu() {
//     add_menu_page('Personalização do Tema', "Personalização do Tema", 'manage_options', 'my-page-slug', 'my_function');
// }

// function my_function() {
//     include 'page.php';
// }