<?php
add_filter( 'manage_competition_posts_columns', 'set_custom_edit_competition_columns' );
add_action( 'manage_competition_posts_custom_column' , 'custom_competition_column', 10, 2 );

function set_custom_edit_competition_columns($columns) {
    unset( $columns['date'] );
    $columns['id'] = __( 'ID', 'your_text_domain' );
    $columns['tla'] = __( 'TLA', 'your_text_domain' );
    $columns['area'] = __( 'Area', 'your_text_domain' );
    $columns['teams'] = __( 'Teams', 'your_text_domain' );
    return $columns;
}
function custom_competition_column( $column, $post_id ) {
    switch ( $column ) {
        case 'id' :
            echo get_post_meta( $post_id )['api_id'][0];
            break;
        case 'tla' :
            echo get_post_meta( $post_id , 'comp' )[0];
            break;
        case 'area' :
            echo get_post_meta( $post_id , 'api_area' )[0]; 
            break;
        case 'teams' :
            $teams = getTeamsInComp( $post_id );
            if ( empty( $teams ) ) {
                echo '<form action="' . admin_url( 'admin.php' ) . '?page=football_plugin" method="post">';
                echo '<input name="leagues" id="leagues" type="hidden" value="' . get_post_meta( $post_id , 'comp' )[0] . '">';
                echo '<input type="submit" value="Import Teams">';
                echo '</form>';
            }
            else {
                foreach( $teams as $team ) {
                    echo '<a href=' . get_edit_post_link($team->post_id) . '>';
                    echo get_the_title($team->post_id) . '<br>';
                    echo '</a>';
                }
            }
            break;
    }
}
?>