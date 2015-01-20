<?php
/**
 * Plugin Name: WP Hide Dashboard
 * Plugin URI: http://wphidedash.org/
 * Description: A simple plugin that removes the Dashboard menu, the Personal Options section and the Help link on the Profile page, hides the Dashboard links in the toolbar menu (if activated), and prevents Dashboard access to users assigned to the <em>Subscriber</em> role. Useful if you allow your subscribers to edit their own profiles, but don't want them wandering around your WordPress admin section. <strong>Note: This version requires a minimum of WordPress 3.4. If you are running a version less than that, please upgrade your WordPress install now.</strong>
 * Author: Kim Parsell
 * Author URI: http://wphidedash.org/
 * Version: 2.2.1
 * License: MIT License - http://www.opensource.org/licenses/mit-license.php
 */

/*
 * Copyright (c) 2008-2015 Kim Parsell
 * Personal Options removal code: Copyright (c) 2010 Large Interactive, LLC, Author: Matthew Pollotta
 * Originally based on IWG Hide Dashboard plugin by Thomas Schneider, Copyright (c) 2008
 * (http://www.im-web-gefunden.de/wordpress-plugins/iwg-hide-dashboard/)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this
 * software and associated documentation files (the "Software"), to deal in the Software
 * without restriction, including without limitation the rights to use, copy, modify, merge,
 * publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons
 * to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or
 * substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

// Disallow direct access to the plugin file.
if ( basename( $_SERVER['PHP_SELF'] ) == basename (__FILE__) ) {
	die( 'Sorry, but you cannot access this page directly.' );
}

/**
 * Hide the Dashboard & Help menus, Upgrade notices, and Personal Options section.
 *
 * @since 2.2
 */
function wphd_hide_dashboard() {
	global $blog, $current_user, $id, $parent_file, $wphd_user_capability, $wp_db_version;

	// Bail if earlier version than 3.4.0.
	if ( $wp_db_version < 20596 ) {
		return;
	}

	if ( $wp_db_version >= 20596 ) {

		// First, let's get rid of the Help menu, Update nag, Personal Options section.
		echo "\n" . '<style type="text/css" media="screen">#your-profile { display: none; } .update-nag, #contextual-help-wrap, #contextual-help-link-wrap { display: none !important; }</style>';
		echo "\n" . '<script type="text/javascript">jQuery(document).ready(function($) { $(\'form#your-profile > h3:first\').hide(); $(\'form#your-profile > table:first\').hide(); $(\'form#your-profile\').show(); });</script>' . "\n";

		// Now, let's fix the sidebar admin menu - go away, Dashboard link. */

		// If Multisite, check whether they are in the User Dashboard before removing links.
		$user_id = get_current_user_id();
		$blogs   = get_blogs_of_user( $user_id );

		if ( is_multisite() && is_admin() && empty( $blogs ) ) {
			return;
		} else {
			// Hides Dashboard menu.
			remove_menu_page( 'index.php');

			// Hides separator under Dashboard menu.
			remove_menu_page( 'separator1' );
		}


		// Redirect folks to their profile when they login, or if they try to access the Dashboard via direct URL.
		if ( 'index.php' == $parent_file ) {
			if ( headers_sent() ) {
				echo '<meta http-equiv="refresh" content="0;url=' . admin_url( 'profile.php' ) . '">';
				echo '<script type="text/javascript">document.location.href="' . admin_url( 'profile.php' ) . '"</script>';
			} else {
				if ( wp_redirect( admin_url( 'profile.php' ) ) ) {
					exit();
				}
			}
		}
	}
}
add_action( 'admin_head', 'wphd_hide_dashboard', 0 );

// That's all folks. You were expecting more?
