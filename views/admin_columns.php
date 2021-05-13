<?php
add_filter( 'manage_competition_posts_columns', 'set_custom_edit_competition_columns' );
add_action( 'manage_competition_posts_custom_column' , 'custom_competition_column', 10, 2 );
add_filter( 'manage_team_posts_columns', 'set_custom_edit_team_columns' );
add_action( 'manage_team_posts_custom_column' , 'custom_team_column', 10, 2 );
add_filter( 'manage_player_posts_columns', 'set_custom_edit_player_columns' );
add_action( 'manage_player_posts_custom_column' , 'custom_player_column', 10, 2 );


function set_custom_edit_player_columns($columns) {
    unset( $columns['date'] );
    $columns['tea'] = __( 'Team', 'your_text_domain' );
    $columns['pos'] = __( 'Position', 'your_text_domain' );
    $columns['bir'] = __( 'Birth', 'your_text_domain' );
    $columns['cou'] = __( 'Country of Birth', 'your_text_domain' );
    $columns['nat'] = __( 'Nationality', 'your_text_domain' );
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
    }
}
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
                    echo '<a href=' . get_edit_post_link( $team->ID ) . '>';
                    echo $team->post_title . '<br>';
                    echo '</a>';
                }
            }
            break;
    }
}
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
                    echo '<a href=' . get_edit_post_link( $player->ID ) . '>';
                    echo $player->post_title . '<br>';
                    echo '</a>';
                }
            }
            break;
    }
}
?>