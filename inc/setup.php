<?php


/** Setup post types and pages */
function projectsoul_posts_page_setup(){

    add_post_type_support( 'page', 'excerpt' );

}

add_action( 'init', 'projectsoul_posts_page_setup' );


/** Enqueue scripts and styles */
function projectsoul_secondary_scripts() {

    wp_enqueue_style( 'projectsoul-slick-style', get_template_directory_uri() . '/js/slick/slick.css'  );

    wp_enqueue_style( 'projectsould-custom-style', get_template_directory_uri() . '/style-custom.css' );

    wp_enqueue_script( 'projectsoul-slick-js', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), '2017', true );

    wp_enqueue_script( 'projectsoul-index', get_template_directory_uri() . '/js/index.js', array('projectsoul-slick-js'), '2017', true );
}

add_action( 'wp_enqueue_scripts', 'projectsoul_secondary_scripts' );

?>