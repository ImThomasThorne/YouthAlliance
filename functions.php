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

