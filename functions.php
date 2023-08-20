<?php
/**
 * Herobiz functions and definitions.
 */

if(! function_exists('herobiz_setup')){
    /**
     * Sets up theme defaults and registers support for various wordpress features.
     * 
     * Note that this function is hooked into the after_setup_theme hook,which 
     * runs before the init hook. the init hook is too late for some features such 
     * as indicating support for post thumbnails.
     */
    
     function herobiz_setup(){
        /**
         * Make Theme available for translation.
         * Translations can be filed in the /languages/directory.
         * If you're building a theme based on crafty press, use a find and replace
         * to change 'herobiz' to the name of your theme in all the template files.
         */
        load_theme_textdomain('herobiz',get_template_directory().'/languages');

        //Add default posts and comments Rss feed links to head.
        add_theme_support('automatic-feed-links');
        /**
         * Let Wordpress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the documnet head, and expect wordpress to 
         * provide it for us.
         */
        add_theme_support('title-tag');
        

        /**
         * Enable support for post thumbnails on posts and pages.
         * 
         * @Link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        //add_theme_support('post-thumbnails');
        add_theme_support( 'post-thumbnails' );
        //Set up the wordpress core custom background feature.
        // add_theme_support('custom-background',apply_filters('herobiz_custom_background_args',array(
        //     'default-color'=>'2271b1',
        //     'default-image'=>'',
        // )));

        add_theme_support( 'custom-background', apply_filters( 'herobiz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

        /**
         * Switch default core markup for search form, comment form, and comments
         * to output valid html5.
         */
        add_theme_support('html5',array(
            'search-form',
            'comment-form',
            'comments-list',
            'gallery',
            'caption'
        ));
        //Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom Logo.
         *
         */
        add_theme_support('custom-logo',[
            'height'=>250,
            'width'=>250,
            'flex-width'=>true,
            'flex-height'=>true,
        ]);
        /**
         * Add Support for custom  Page Header
         */
        add_theme_support('custom-header',array(
            'flex-width'=>true,
            'width'=>1600,
            'flex-height'=>true,
            'height'=>450,
            'default-image'=>'',
        ));
        /**
         * Add Post Type Support
         */
        add_theme_support('post-formats',array('aside','gallery','link','image','quote','video','audio'));

        register_nav_menus(array(
            'primary'=>esc_html__('Primary','herobiz'),
            'footer'=>esc_html__('Footer Menu','herobiz'),
        ));
    }

}
add_action('after_setup_theme','herobiz_setup');
/**
 * Set the content idth in pixels, based on the theme's design and stylesheet.
 * 
 * Priority 0 to make it available to lower priority callbacks.
 * 
 * @global int $content_width 
 */
function herobiz_content_width(){
    //This variable is intended to be overruled fro themes.
    //open WPCS issues:{@Link https://github.com/wordpress-codung-standards/wordpress-coding-standards/issues/1043}.
    //phpcs:ignore wordpress.Namingconventions.prefixallglobals.NonprefixedvariableFound
    $GLOBALS['content_width']=apply_filters('herobiz_content_width',1170);
}
add_action('after_setup_theme','herobiz_content_width',0);

/**
 * Register sidebar widget area.
 * 
 * @since 1.0.0
 */
function herobiz_sidebar_widgets_init(){
    //default sidebar
    register_sidebar(array(
        'name'=>esc_html__('Sidebar','herobiz'),
        'id'  =>'default_sidebar',
        'description'=>esc_html__('Add Widgets here.','herobiz'),
        'before_widget'=>'<section id="%1$s" class="widger %2$s">',
        'after_widget'=>'</section>',
        'before_title'=>'<h4 class="widget-title">',
        'after_title'=>'</h4>',
    ));
}
add_action('widgets_init','herobiz_sidebar_widgets_init');
/**
 * Enqueue public scripts and styles.
 */
function herobiz_public_scripts(){

}
add_action('wp_enqueue_scripts','herobiz_public_scripts');

/***
 * Enqueue admin scripts and styles.
 */
function herobiz_admin_scripts(){

}
add_action('admin_enqueue_scripts','herobiz_admin_scripts');
?>