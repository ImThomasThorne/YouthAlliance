<?php

function cyatheme_setup() {
    // Adding theme support
    add_theme_support( 'editor-styles' );

    add_editor_style( 'style.css' );
}

add_action('after_setup_theme','cyatheme_setup');

/** Custom Block Category  **/

function custom_category( $categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'cya-theme',
                'title' => 'CYA Theme', 'cya theme'
            )
        )
    );
}

add_filter('block_categories', 'custom_category', 10, 2);

/** Loading ACF  **/

function cyatheme_block_render_callback( $block ) {
    $slug = str_replace('act/', '', $block['name']);

    // include a template part from within the "template-parts/blocks" folder

    if( file_exists( get_theme_file_path("/template-parts/blocks/{$slug}.php")) ) {
        include( get_theme_file_path("/template-parts/blocks/{$slug}.php") );
    }
}

// Register ACF Blocks

add_action('acf/init','my_act_init');

function my_act_init() {

}