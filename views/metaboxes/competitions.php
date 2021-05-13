<?php
add_action( 'admin_init', 'my_admin_metaboxes_comp' );

function my_admin_metaboxes_comp() {
    
    add_meta_box( 'competition_meta_box1', 'ID', 'display_competition_meta_box1','competition', 'side', 'high' );
    add_meta_box( 'competition_meta_box2', 'TLA', 'display_competition_meta_box2','competition', 'side', 'high' );
    add_meta_box( 'competition_meta_box3', 'Area', 'display_competition_meta_box3','competition', 'side', 'high' );
    add_meta_box( 'competition_meta_box5', 'Teams and Players', 'display_competition_meta_box5','competition', 'side', 'high' );
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
    
    $teams = getTeamsInComp( $competition->ID );
    //var_dump($teams);
    
    foreach( $teams as $team ) {
        echo '<a style="font-weight:bold" href=' . get_edit_post_link( $team->post_id ) . '>';
        echo get_the_title( $team->post_id ) . '<br>';
        echo '</a>';
        
        $players = get_posts(array(
            'numberposts' => -1,
            'post_type' => 'player' , 
            'meta_key'   => 'api_team_code',
            'meta_value' => get_post_meta( $team->post_id , 'api_tla' ),
        ));
        
        foreach( $players as $player ) {
            echo '- ';
            echo '<a href=' . get_edit_post_link( $player->ID ) . '>';
            echo $player->post_title . '<br>';
            echo '</a>';
        }
    }
}
?>