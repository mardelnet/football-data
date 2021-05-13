<?php
class Team extends MainModels {

    public $type = 'team';
    
    protected function insert_posts( $data , $type ) {
        foreach ( $data->teams as $team ) {    

            $exist = $this->checkIfExists( 'team' , $team->id );

            if ( empty( $exist ) ) {
                $new_team = array(
                    'post_type' => 'team',
                    'post_status' => 'publish',
                    'post_title' => $team->name,
                    'meta_input'   => array(
                        'api_tla' => $team->tla,
                        'api_id' => $team->id,
                        'api_shortname' => $team->shortName,
                        'api_email' => $team->email,
                        'api_area' => $team->area->name,
                        'team_competition' => $data->competition->code),
                );
                $flag = wp_insert_post($new_team);
            }
            else {
                $new_team = array(
                    'ID' => $exist[0]->ID,
                    'meta_input'   => array(
                        'team_competition' => get_post_meta( $exist[0]->ID , 'team_competition' )[0] . ' / ' . $data->competition->code),
                );
            }
            
        }
    }
}
?>