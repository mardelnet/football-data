<?php
add_action( 'admin_init', 'my_admin_metaboxes_players' );

function my_admin_metaboxes_players() {
    
    add_meta_box( 'player_meta_box1', 'Team', 'display_player_meta_box1','player', 'side', 'high' );
    add_meta_box( 'player_meta_box2', 'Position', 'display_player_meta_box2','player', 'side', 'high' );
    add_meta_box( 'player_meta_box3', 'Birth', 'display_player_meta_box3','player', 'side', 'high' );
    add_meta_box( 'player_meta_box4', 'Country of Birth', 'display_player_meta_box4','player', 'side', 'high' );
    add_meta_box( 'player_meta_box5', 'Nationality', 'display_player_meta_box5','player', 'side', 'high' );
}
function display_player_meta_box1( $player ) {
    echo get_post_meta( $player->ID )['api_team'][0];
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