<?php
add_action('admin_menu', 'football_plugin_setup_menu');
add_filter('use_block_editor_for_post', '__return_false', 10);

function deleteAll() {
    $allposts= get_posts( array(
        'post_type' => array( 'competition' , 'team' , 'player' ) ,
        'numberposts' => -1),
    );
    foreach ($allposts as $eachpost) {
        wp_delete_post( $eachpost->ID, true );
    }
}
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
    global $wpdb;
    $meta = "'%" .  get_post_meta( $post_id , 'api_tla' )[0] . "%'";
    $players = $wpdb->get_results( "SELECT * FROM $wpdb->postmeta WHERE `meta_key` LIKE 'api_team_code' AND `meta_value` LIKE $meta" );
    //var_dump($players);
    return $players;
}
function getTeamsInComp( $post_id ) {
    global $wpdb;
    $meta = "'%" .  get_post_meta( $post_id , 'comp' )[0] . "%'";
    $teams = $wpdb->get_results( "SELECT * FROM $wpdb->postmeta WHERE `meta_key` LIKE 'team_competition' AND `meta_value` LIKE $meta" );
    //var_dump($teams);
    return $teams;
}
?>