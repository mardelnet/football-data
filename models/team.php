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
                $current_comp = get_post_meta( $exist[0]->ID , 'team_competition' )[0];

                if ( strpos( $current_comp , $data->competition->code ) !== false ) {    
                    $update_comp = $current_comp;
                }
                else {
                    $update_comp = $current_comp . ' / ' . $data->competition->code;
                }

                $new_team = array(
                    'ID' => $exist[0]->ID,
                    'meta_input'   => array(
                        'team_competition' => $update_comp),
                );
                $flag = wp_update_post($new_team);
            }
        }
    }
}
?>