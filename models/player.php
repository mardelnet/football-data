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
        
        foreach ( $data->squad as $player ) {  

            $exist = $this->checkIfExists( 'player' , $player->id );

            if ( empty( $exist ) ) {
                //var_dump($player);
                $new_player = array(
                    'post_type' => 'player',
                    'post_status' => 'publish',
                    'post_title' => $player->name,
                    'meta_input'   => array(
                        'api_id' => $player->id,
                        'api_team' => $club_name,
                        'api_team_code' => $club_code,
                        'api_position' => $player->position,
                        'api_birth' => $player->dateOfBirth,
                        'api_cbirth' => $player->countryOfBirth,
                        'api_nation' => $player->nationality),
                );
                $flag = wp_insert_post($new_player);
            }
            else {
                $current_team = get_post_meta( $exist[0]->ID , 'api_team_code' )[0];
                $current_team_name = get_post_meta( $exist[0]->ID , 'api_team' )[0];

                if ( strpos( $current_team , $club_code ) !== false ) {    
                    $update_team_code = $current_team;
                    $update_team_name = $current_team_name;
                }
                else {
                    $update_team_code = $current_team . ' / ' . $club_code;
                    $update_team_name = $current_team_name . ' / ' . $club_name;
                }

                $new_player = array(
                    'ID' => $exist[0]->ID,
                    'meta_input'   => array(
                        'api_team' => $update_team_name,
                        'api_team_code' => $update_team_code),
                );
                $flag = wp_update_post($new_player);
            }
        }
    }
}
?>