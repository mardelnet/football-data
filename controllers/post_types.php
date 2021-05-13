<?php
add_action( 'init', 'create_posttype' );

function create_posttype() {
 
    register_post_type( 'competition',
        array(
            'labels' => array(
                'name' => __( 'Competitions' ),
                'singular_name' => __( 'Competition' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'competition'),
            'show_in_rest' => true,
 
        )
    );
    register_post_type( 'team',
        array(
            'labels' => array(
                'name' => __( 'Teams' ),
                'singular_name' => __( 'Team' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'team'),
            'show_in_rest' => true,
 
        )
    );
    register_post_type( 'player',
        array(
            'labels' => array(
                'name' => __( 'Players' ),
                'singular_name' => __( 'Player' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'player'),
            'show_in_rest' => true,
 
        )
    );
}
?>