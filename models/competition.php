<?php
class Competition extends MainModels {

    public $type = 'competition';

    protected function insert_posts( $data , $type ) {
        foreach ( $data->competitions as $competition ) {
            if ( in_array( $competition->code , getAllCompetitions() ) ) {
                if ( empty($this->checkIfExists( 'competition' , $competition->id )) ) {
                    $new_competition = array(
                        'post_type' => 'competition',
                        'post_status' => 'publish',
                        'post_title' => $competition->name,
                        'meta_input'   => array(
                            'api_id' => $competition->id,
                            'api_area' => $competition->area->name,
                            'comp' => $competition->code),
                    );
                    $flag = wp_insert_post($new_competition);
                }
            }
        }   
    }
}
?>