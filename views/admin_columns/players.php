<?php
add_filter( 'manage_player_posts_columns', 'set_custom_edit_player_columns' );
add_action( 'manage_player_posts_custom_column' , 'custom_player_column', 10, 2 );

function set_custom_edit_player_columns($columns) {
    unset( $columns['date'] );
    $columns['tea'] = __( 'Team', 'your_text_domain' );
    $columns['pos'] = __( 'Position', 'your_text_domain' );
    $columns['bir'] = __( 'Birth', 'your_text_domain' );
    $columns['cou'] = __( 'Country of Birth', 'your_text_domain' );
    $columns['nat'] = __( 'Nationality', 'your_text_domain' );
    $columns['tea'] = __( 'Teams', 'your_text_domain' );
    return $columns;
}
function custom_player_column( $column, $post_id ) {
    switch ( $column ) {
        case 'tea' :
            echo get_post_meta( $post_id )['api_team'][0];
            break;
        case 'pos' :
            echo get_post_meta( $post_id )['api_position'][0];
            break;
        case 'bir' :
            echo get_post_meta( $post_id , 'api_birth' )[0]; 
            break;
        case 'cou' :
            echo get_post_meta( $post_id , 'api_cbirth' )[0]; 
            break;
        case 'nat' :
            echo get_post_meta( $post_id , 'api_nation' )[0]; 
            break;
        case 'nat' :
            echo get_post_meta( $post_id , 'api_team' )[0]; 
            break;
    }
}
?>