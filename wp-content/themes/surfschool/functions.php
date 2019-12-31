<?php

/**
 * Surf School functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage SurfSchool
 * @since 1.0.0
 */

// ACF Custom Fields
require_once('inc/acf/custom_fields.php');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function surfschool_theme_support()
{
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'surfschool' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('surfschool');

	// Add support for full and wide align images.
	add_theme_support('align-wide');
}

add_action('after_setup_theme', 'surfschool_theme_support');

/**
 * Register and Enqueue Styles.
 */
function surfschool_register_styles()
{
	$theme_version = wp_get_theme()->get('Version');

	// wp_enqueue_style('surfschool-style', get_stylesheet_uri(), array(), $theme_version);
	wp_enqueue_style('surfschool-style', get_template_directory_uri() . '/assets/css/main.css', array(), $theme_version);
}

add_action('wp_enqueue_scripts', 'surfschool_register_styles');

/**
 * Register and Enqueue Scripts.
 */
function surfschool_register_scripts()
{
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_script('surfschool-js', get_template_directory_uri() . '/assets/js/main.js', array(), $theme_version, false);
	wp_script_add_data('surfschool-js', 'async', true);
}

add_action('wp_enqueue_scripts', 'surfschool_register_scripts');

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function surfschool_skip_link_focus_fix()
{
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
	<script>
		/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
			var t, e = location.hash.substring(1);
			/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
		}, !1);
	</script>
<?php
}
add_action('wp_print_footer_scripts', 'surfschool_skip_link_focus_fix');

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function surfschool_menus()
{

	$locations = array(
		'primary'  => __('Main Menu', 'surfschool'),
		'footer'   => __('Footer Menu', 'surfschool'),
		'social'   => __('Social Menu', 'surfschool'),
	);

	register_nav_menus($locations);
}

add_action('init', 'surfschool_menus');

if (!function_exists('wp_body_open')) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function surfschool_skip_link()
{
	echo '<a class="skip-link screen-reader-text sr-only" href="#site-content">' . __('Skip to the content', 'surfschool') . '</a>';
}

add_action('wp_body_open', 'surfschool_skip_link', 5);
