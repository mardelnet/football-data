<?php
add_filter( 'manage_team_posts_columns', 'set_custom_edit_team_columns' );
add_action( 'manage_team_posts_custom_column' , 'custom_team_column', 10, 2 );

function set_custom_edit_team_columns($columns) {
    unset( $columns['date'] );
    $columns['id'] = __( 'ID', 'your_text_domain' );
    $columns['tla'] = __( 'TLA', 'your_text_domain' );
    $columns['shortName'] = __( 'Short Name', 'your_text_domain' );
    $columns['areaName'] = __( 'Area', 'your_text_domain' );
    $columns['email'] = __( 'Email', 'your_text_domain' );
    $columns['comp'] = __( 'Competitions', 'your_text_domain' );
    $columns['players'] = __( 'Players', 'your_text_domain' );
    return $columns;
}
function custom_team_column( $column, $post_id ) {
    switch ( $column ) {
        case 'id' :
            echo get_post_meta( $post_id )['api_id'][0];
            break;
        case 'tla' :
            echo get_post_meta( $post_id )['api_tla'][0];
            break;
        case 'shortName' :
            echo get_post_meta( $post_id , 'api_shortname' )[0]; 
            break;
        case 'email' :
            echo get_post_meta( $post_id , 'api_email' )[0]; 
            break;
        case 'areaName' :
            echo get_post_meta( $post_id , 'api_area' )[0]; 
            break;
        case 'comp' :
            echo get_post_meta( $post_id , 'team_competition' )[0];
            break;
        case 'players' :
            $players = getPlayersInTeam( $post_id );
            if ( empty( $players ) ) {
                echo '<form action="' . admin_url( 'admin.php' ) . '?page=football_plugin" method="post">';
                echo '<input name="impo_team" id="impo_team" type="hidden" value="' . get_post_meta( $post_id , 'api_id' )[0] . '">';
                echo '<input type="submit" value="Import Players">';
                echo '</form>';
            }
            else {
                foreach( $players as $player ) {
                    //var_dump($player);
                    echo '<a href=' . get_edit_post_link( $player->post_id ) . '>';
                    echo get_the_title($player->post_id) . '<br>';
                    echo '</a>';
                }
            }
            
            break;
    }
}
?>