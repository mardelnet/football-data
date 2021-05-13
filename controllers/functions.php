<?php
add_action('admin_menu', 'football_plugin_setup_menu');
add_filter('use_block_editor_for_post', '__return_false', 10);

function football_plugin_setup_menu(){
    add_menu_page( 
        'Football Data Page', 
        'Football Data', 
        'manage_options', 
        'football_plugin', 
        'football_interface' );
}
function getAllCompetitions() {
    return array( "BSA","PL","ELC","CL","EC","FL1","BL1","SA","DED","PPL","PD","WC" );
}
function getPlayersInTeam( $post_id ) {
    $players = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'player' , 
        'meta_key'   => 'api_team',
        'meta_value' => get_the_title( $post_id ),
    ));
    return $players;
}
function getTeamsInComp( $post_id ) {
    $teams = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'team' , 
        'meta_key'   => 'team_competition',
        'meta_value' => get_post_meta( $post_id , 'comp' )[0],
    ));
    return $teams;
}
?>