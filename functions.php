<?php

/*	-----------------------------------------------------------------------------------------------
	THEME SUPPORTS
--------------------------------------------------------------------------------------------------- */

function youthalliance_setup() {
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'youthalliance_setup' );


/*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLESHEETS
--------------------------------------------------------------------------------------------------- */

function youthalliance_styles() {
	wp_enqueue_style( 'youthalliance-styles', get_theme_file_uri( '/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'youthalliance_styles' );

// Github Updater

require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/ImThomasThorne/youthalliance',
	__FILE__,
	'youthalliance'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('your-token-here');

function current_year() {
	return date('Y');
}

add_shortcode('current-year', 'current_year');


// Order By

function my_pre_get_posts( $query ) {
    
    // do not modify queries in the admin
    if( is_admin() ) {
        
        return $query;
        
    }
    

    // only modify queries for 'event' post type
    if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'our-team' ) {
        
        $query->set('orderby', 'meta_value_num');    
        $query->set('meta_key', 'order-by');    
        $query->set('order', 'DESC'); 
        
    }
    

    // return
    return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');