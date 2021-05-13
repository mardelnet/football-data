<?php
add_action( 'admin_init', 'my_admin_metaboxes' );

function my_admin_metaboxes() {
    
    add_meta_box( 'competition_meta_box1', 'ID', 'display_competition_meta_box1','competition', 'side', 'high' );
    add_meta_box( 'competition_meta_box2', 'TLA', 'display_competition_meta_box2','competition', 'side', 'high' );
    add_meta_box( 'competition_meta_box3', 'Area', 'display_competition_meta_box3','competition', 'side', 'high' );
    //add_meta_box( 'competition_meta_box4', 'Teams', 'display_competition_meta_box4','competition', 'side', 'high' );
    add_meta_box( 'competition_meta_box5', 'Teams and Players', 'display_competition_meta_box5','competition', 'side', 'high' );

    add_meta_box( 'team_meta_box1', 'ID', 'display_team_meta_box1','team', 'side', 'high' );
    add_meta_box( 'team_meta_box2', 'TLA', 'display_team_meta_box2','team', 'side', 'high' );
    add_meta_box( 'team_meta_box3', 'Shortname', 'display_team_meta_box3','team', 'side', 'high' );
    add_meta_box( 'team_meta_box4', 'Area', 'display_team_meta_box4','team', 'side', 'high' );
    add_meta_box( 'team_meta_box5', 'Email', 'display_team_meta_box5','team', 'side', 'high' );
    add_meta_box( 'team_meta_box6', 'Competitions', 'display_team_meta_box6','team', 'side', 'high' );
    add_meta_box( 'team_meta_box7', 'Players', 'display_team_meta_box7','team', 'side', 'high' );

    add_meta_box( 'player_meta_box1', 'Team', 'display_player_meta_box1','player', 'side', 'high' );
    add_meta_box( 'player_meta_box2', 'Position', 'display_player_meta_box2','player', 'side', 'high' );
    add_meta_box( 'player_meta_box3', 'Birth', 'display_player_meta_box3','player', 'side', 'high' );
    add_meta_box( 'player_meta_box4', 'Country of Birth', 'display_player_meta_box4','player', 'side', 'high' );
    add_meta_box( 'player_meta_box5', 'Nationality', 'display_player_meta_box5','player', 'side', 'high' );
}
function display_competition_meta_box1( $competition ) {
    echo get_post_meta( $competition->ID )['api_id'][0]; 
}
function display_competition_meta_box2( $competition ) {
    echo get_post_meta( $competition->ID )['comp'][0]; 
}
function display_competition_meta_box3( $competition ) {
    echo get_post_meta( $competition->ID )['api_area'][0]; 
}
function display_competition_meta_box4( $competition ) {
    $teams = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'team' , 
        'meta_key'   => 'team_competition',
        'meta_value' => get_post_meta( $competition->ID , 'comp' )[0],
    ));
    foreach( $teams as $team ) {
        echo '<a href=' . get_edit_post_link( $team->ID ) . '>';
        echo $team->post_title . '<br>';
        echo '</a>';
    }
}
function display_competition_meta_box5( $competition ) {
    
    $teams = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'team' , 
        'meta_key'   => 'team_competition',
        'meta_value' => get_post_meta( $competition->ID , 'comp' )[0],
    ));
    
    foreach( $teams as $team ) {
        echo '<a style="font-weight:bold" href=' . get_edit_post_link( $team->ID ) . '>';
        echo $team->post_title . '<br>';
        echo '</a>';
        
        $players = get_posts(array(
            'numberposts' => -1,
            'post_type' => 'player' , 
            'meta_key'   => 'api_team_code',
            'meta_value' => get_post_meta( $team->ID , 'api_tla' ),
        ));
        
        foreach( $players as $player ) {
            echo '- ';
            echo '<a href=' . get_edit_post_link( $player->ID ) . '>';
            echo $player->post_title . '<br>';
            echo '</a>';
        }
    }
}
function display_team_meta_box1( $team ) {
    echo get_post_meta( $team->ID )['api_id'][0]; 
}
function display_team_meta_box2( $team ) {
    echo get_post_meta( $team->ID )['api_tla'][0]; 
}
function display_team_meta_box3( $team ) {
    echo get_post_meta( $team->ID )['api_shortname'][0]; 
}
function display_team_meta_box4( $team ) {
    echo get_post_meta( $team->ID )['api_email'][0]; 
}
function display_team_meta_box5( $team ) {
    echo get_post_meta( $team->ID )['api_area'][0]; 
}
function display_team_meta_box6( $team ) {
    echo get_post_meta( $team->ID )['team_competition'][0]; 
}
function display_team_meta_box7( $team ) {
    $players = getPlayersInTeam( $post_id );
    if ( empty( $players ) ) {
        echo '<form action="' . admin_url( 'admin.php' ) . '?page=football_plugin" method="post">';
        echo '<input name="impo_team" id="impo_team" type="hidden" value="' . get_post_meta( $team->ID , 'api_id' )[0] . '">';
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
}
function display_player_meta_box1( $player ) {
    echo get_post_meta( $player->ID )['api_team'][0];
    echo ' : ';
    echo get_post_meta( $player->ID )['api_team_code'][0]; 
}
function display_player_meta_box2( $player ) {
    echo get_post_meta( $player->ID )['api_position'][0]; 
}
function display_player_meta_box3( $player ) {
    echo get_post_meta( $player->ID )['api_birth'][0]; 
}
function display_player_meta_box4( $player ) {
    echo get_post_meta( $player->ID )['api_cbirth'][0]; 
}
function display_player_meta_box5( $player ) {
    echo get_post_meta( $player->ID )['api_nation'][0]; 
}
?>