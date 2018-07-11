<?php 

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'fancybox','https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css' );
	wp_enqueue_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js' );
	
}

// add options 

function theme2017_customize_register( $wp_customize ) {
	
	$wp_customize->add_section( 'contacts' , array(
		'title'      => __( 'Contacts', 'twentyseventeen' ),
		'priority'   => 10,
	) );
	
	$wp_customize->add_setting( 'footer_phone' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	
	$wp_customize->add_control('footer_phone', array(
		'label' => __( 'Footer Phone', 'twentyseventeen' ),
		'section' =>  'contacts',
		'type' => 'text',
		
	));
	
	$wp_customize->add_setting( 'footer_email' , array(
		'default'   => get_option('admin_email'),
		'transport' => 'refresh',
	) );
	
	$wp_customize->add_control('footer_email', array(
		'label' => __( 'Footer Email', 'twentyseventeen' ),
		'section' =>  'contacts',
		'type' => 'email',		
	));
}
add_action( 'customize_register', 'theme2017_customize_register' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart', 15);
add_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 30);




function register_books() {

	/**
	 * Post Type: Books.
	 */

	$labels = array(
		"name" => __( "Books", "" ),
		"singular_name" => __( "Book", "" ),
	);

	$args = array(
		"label" => __( "Books", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "books", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "genre" ),
	);

	register_post_type( "books", $args );
}

add_action( 'init', 'register_books' );


function register_genre() {

	/**
	 * Taxonomy: Genre.
	 */

	$labels = array(
		"name" => __( "Genre", "" ),
		"singular_name" => __( "Genre", "" ),
	);

	$args = array(
		"label" => __( "Genre", "" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Genre",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'genre', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "genre",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "genre", array( "books" ), $args );
}

add_action( 'init', 'register_genre' );
