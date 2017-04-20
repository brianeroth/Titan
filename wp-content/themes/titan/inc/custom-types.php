<?php

// register_taxonomy('taxonomy_name', array('related_post_type'), array(
//     'labels'                => array(
//         'name'                       => __( 'taxonomy_name', 'titan' ),
//         'separate_items_with_commas' => __( 'Separate taxonomy_name with commas', 'titan' ),
//         'choose_from_most_used'      => __( 'Choose from the most used taxonomy_name', 'titan' ),
//     ),
//     'hierarchical'          => false,
//     'show_admin_column'     => true,
//     'update_count_callback' => '_update_post_term_count'
// ));
// register_taxonomy_for_object_type( 'taxonomy_name', 'related_post_type' );
    
function titan_taxonomies(){
	register_taxonomy('taxonomy_name', array('related_post_type'), array(
	    'labels'                => array(
	        'name'                       => __( 'taxonomy_name', 'titan' ),
	        'separate_items_with_commas' => __( 'Separate taxonomy_name with commas', 'titan' ),
	        'choose_from_most_used'      => __( 'Choose from the most used taxonomy_name', 'titan' ),
	    ),
	    'hierarchical'          => false,
	    'show_admin_column'     => true,
	    'update_count_callback' => '_update_post_term_count'
	));
	register_taxonomy_for_object_type( 'taxonomy_name', 'related_post_type' );

}
add_action('init', 'titan_taxonomies');

// register_post_type('post_type', array(
//     'labels'       => array(
//         'name'               => __( 'post_type', 'titan' ),
//         'singular_name'      => __( 'post_type', 'titan' ),
//         'add_new_item'       => __( 'Add new post_type', 'titan' ),
//         'edit_item'          => __( 'Edit post_type', 'titan' ),
//         'new_item'           => __( 'New post_type', 'titan' ),
//         'view_item'          => __( 'View post_type', 'titan' ),
//         'search_items'       => __( 'Search post_types', 'titan' ),
//         'not_found'          => __( 'No post_types found', 'titan' ),
//         'not_found_in_trash' => __( 'No post_types found in Trash', 'titan' ),
//     ),
//     'supports' => array('title', 'editor', 'thumbnail'),
//     'public'   => true,
//     'rewrite'  => array(
//         'slug' => 'post_type'
//     )
// ));


function titan_content_types(){
    
}
add_action('init', 'titan_content_types');