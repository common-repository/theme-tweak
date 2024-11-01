<?php
/*
Plugin Name: Theme Tweak
Plugin URI: http://keep2thecode.fether.net/theme-tweak-wordpress-plugin/
Description: This plugin allows you to "tweak" or do minor overrides to the style for any theme. But it also handles images for your site's logo, url, smartphone bookmark, and social sharing icons, without having to change or alter your theme.
Version: 2.0
Author: Keep2theCode
Author URI: http://keep2thecode.fether.net
License: GPL2
 Copyright 2012 Keep2theCode  (email: keep2thecode@me.com)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License, version 2, as 
 published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// include Admin plugin settings
function thtw_admin() {include('thtw_admin.php');}
	
// register the plugin in the Admin Settings menu
function thtw_admin_actions() {
	add_options_page('Theme Tweak Options', 'Theme Tweak', 'manage_options', 'thtw', 'thtw_admin');
	}
add_action('admin_menu','thtw_admin_actions');

//
// get the style sheet name from the database options
// the file itself is stored in the plugin's uploads directory
//
function thtw_getcss() {
	$cssname = get_option( 'thtw_options' );
	// Only enqueue if available
	$csspath = dirname( __FILE__ ) . '/uploads/'.$cssname; 
	if ( file_exists( $csspath ) ) {
		wp_register_style( 'thtw-style', plugins_url('/uploads/'.$cssname, __FILE__) );
		wp_enqueue_style( 'thtw-style' );
		}
	}
add_action( 'wp_enqueue_scripts', 'thtw_getcss' );

//
// if they exist, add image links to header
//

// favicon
function thtw_favicon() {
	$favpath = dirname( __FILE__ ) . '/uploads/favicon.ico'; 
	if ( file_exists( $favpath ) ) {?>
<link rel="shortcut icon" href="<?php echo plugins_url(); ?>/theme-tweak/uploads/favicon.ico" type="image/vnd.microsoft.icon" />
		<?php }
	}
add_action( 'wp_head', 'thtw_favicon' );

// phone icon
function thtw_fonicon() {
	$fonpath = dirname( __FILE__ ) . '/uploads/phone.png'; 
	if ( file_exists( $fonpath ) ) {?>
<link rel="apple-touch-icon" href="<?php echo plugins_url(); ?>/theme-tweak/uploads/phone.png" />
		<?php }
	}
add_action( 'wp_head', 'thtw_fonicon' );

// share icon
function thtw_shricon() {
	$shrpath = dirname( __FILE__ ) . '/uploads/share.png'; 
	if ( file_exists( $shrpath ) ) {?>
<link rel="image_src" href="<?php echo plugins_url(); ?>/theme-tweak/uploads/share.png" />
		<?php }
	}
add_action( 'wp_head', 'thtw_shricon' );

// site logo
function thtw_logo() {
	$logpath = dirname( __FILE__ ) . '/uploads/logo.png'; 
	if ( file_exists( $logpath ) ) {?>
<div id="logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo plugins_url(); ?>/theme-tweak/uploads/logo.png" /></a>
		</div>
	<?php }
	}
?>