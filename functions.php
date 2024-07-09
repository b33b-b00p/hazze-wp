<?php
if (!defined('_S_VERSION')) {
   // Replace the version number of the theme on each release.
   define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hazze_setup()
{
   /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on hazze, use a find and replace
		* to change 'hazze' to the name of your theme in all the template files.
		*/
   load_theme_textdomain('hazze', get_template_directory() . '/languages');

   // Add default posts and comments RSS feed links to head.
   add_theme_support('automatic-feed-links');

   /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
   add_theme_support('title-tag');

   /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
   add_theme_support('post-thumbnails');

   // This theme uses wp_nav_menu() in one location.
   register_nav_menus(array(
      'header'    => 'Шапка',    //Название месторасположения меню в шаблоне
      'footer' => 'Подвал'      //Название другого месторасположения меню в шаблоне
   ));

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
         'style',
         'script',
      )
   );

   // Add theme support for selective refresh for widgets.
   add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'hazze_setup');

/**
 * Enqueue scripts and styles.
 */
function hazze_scripts()
{
   wp_enqueue_style('hazze-style', get_stylesheet_uri(), array(), _S_VERSION);

   wp_enqueue_style('libre-franklin-fonts', 'https://fonts.googleapis.com/css?family=Libre+Franklin:400,500,600,700,800,900&display=swap', array(), _S_VERSION);
   wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION);
   wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), _S_VERSION);
   wp_enqueue_style('themify-icons', get_template_directory_uri() . '/css/themify-icons.css', array(), _S_VERSION);
   wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION);
   wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), _S_VERSION);
   wp_enqueue_style('slicknav', get_template_directory_uri() . '/css/slicknav.min.css', array(), _S_VERSION);
   wp_enqueue_style('hazze-style-main', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION);

   wp_deregister_script('jquery');
   wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), _S_VERSION, true);
   wp_enqueue_script('jquery');

   wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true);
   wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), _S_VERSION, true);
   wp_enqueue_script('mixitup', get_template_directory_uri() . '/js/mixitup.min.js', array('jquery'), _S_VERSION, true);
   wp_enqueue_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), _S_VERSION, true);
   wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true);
   wp_enqueue_script('hazze-script-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'hazze_scripts');

// adding custom pages for editing general settings, header and footer
if (function_exists('acf_add_options_page')) {

   acf_add_options_page(array(
      'page_title'    => 'Основные настройки',
      'menu_title'   => 'Настройки темы',
      'menu_slug'    => 'theme-general-settings',
      'capability'   => 'edit_posts',
      'redirect'      => false
   ));

   acf_add_options_sub_page(array(
      'page_title'    => 'Настройки header',
      'menu_title'   => 'Header',
      'parent_slug'   => 'theme-general-settings',
   ));

   acf_add_options_sub_page(array(
      'page_title'    => 'Настройки footer',
      'menu_title'   => 'Footer',
      'parent_slug'   => 'theme-general-settings',
   ));
}

// creating a custom resolution option for images 
add_image_size('hazze-custom', 785, 393, true);

// adding a shortcode
add_shortcode('pinkBanner', 'pinkBanner_shortcode');

function pinkBanner_shortcode()
{
   require 'shortcodes/pink-banner.php';
}

// changing length of the_excerpt()
add_filter('excerpt_length', function () {
   return 10;
});
// changing how the_excerpt() ends if initial text is longer
add_filter('excerpt_more', function ($more) {
   return '...';
});

// connecting breadcrumbs file
require 'breadcrumbs.php';