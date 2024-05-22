<?php

function register_acf_block_types() {
    //Page Subheading
    acf_register_block_type(array(
        'name' => 'Page Subheading',
        'title' => __('Page Subheading'),
        'description' => __('A Subheading for a page'),
        'render_templates' => '/acf_blocks/page-subheading.php',
        'icon' => 'heading',
        'keywords' => array('subheading', 'page'),
        'mode' => 'edit',
    )
    );
}