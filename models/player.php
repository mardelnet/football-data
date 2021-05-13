<?php
class Player extends MainModels {

    public $type = 'player';
    
    protected function insert_posts( $data , $type ) {
        //var_dump($data); 
        $comps = array();
        foreach ( $data->activeCompetitions as $competitions ) {
            array_push( $comps , $competitions->code );
        }
        $club_name = $data->name;
        $club_code = $data->tla;
        echo $data->code;

        foreach ( $data->squad as $player ) {  

            $playerinDB = get_posts(array(
                'numberposts' => 1,
                'post_type' => 'player' , 
                'meta_key'   => 'api_id',
                'meta_value' => $player->id,
            ));
            //echo $playerinDB[0]->ID;
            //var_dump($player);
            $new_player = array(
                'post_type' => 'player',
                'post_status' => 'publish',
                'post_title' => $player->name,
                'meta_input'   => array(
                    'ID' => $playerinDB[0]->ID,
                    'api_id' => $player->id,
                    'api_team' => $club_name,
                    'api_team_code' => $club_code,
                    'api_position' => $player->position,
                    'api_birth' => $player->dateOfBirth,
                    'api_cbirth' => $player->countryOfBirth,
                    'api_nation' => $player->nationality),
            );
            if ( sizeof( $playerinDB ) > 0 ) {
                $flag = wp_update_post($new_player);
            }
            else {
                $flag = wp_insert_post($new_player);
            }
        }
    }
}
?>