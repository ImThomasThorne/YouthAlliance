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