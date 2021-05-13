<?php
add_action( 'admin_init', 'my_admin_metaboxes_teams' );

function my_admin_metaboxes_teams() {
    
    add_meta_box( 'team_meta_box1', 'ID', 'display_team_meta_box1','team', 'side', 'high' );
    add_meta_box( 'team_meta_box2', 'TLA', 'display_team_meta_box2','team', 'side', 'high' );
    add_meta_box( 'team_meta_box3', 'Shortname', 'display_team_meta_box3','team', 'side', 'high' );
    add_meta_box( 'team_meta_box4', 'Area', 'display_team_meta_box4','team', 'side', 'high' );
    add_meta_box( 'team_meta_box5', 'Email', 'display_team_meta_box5','team', 'side', 'high' );
    add_meta_box( 'team_meta_box6', 'Competitions', 'display_team_meta_box6','team', 'side', 'high' );
    add_meta_box( 'team_meta_box7', 'Players', 'display_team_meta_box7','team', 'side', 'high' );

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
    $players = getPlayersInTeam( $team->ID );
    if ( !empty( $players ) ) {
        foreach( $players as $player ) {
            //var_dump($player);
            echo '<a href=' . get_edit_post_link( $player->post_id ) . '>';
            echo get_the_title($player->post_id) . '<br>';
            echo '</a>';
        }   
    }
}
?>