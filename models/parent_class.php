<?php
class MainModels {

  public $imported_data;
  public $type;

  public function __construct( $competition_id ) {
      //$this->remove_all( $competition_id );
      $this->imported_data = $this->import_all( $this->type , $competition_id );
      $this->type = null;
      $this->insert_posts( $this->imported_data , $type );
  }
  protected function insert_posts( $data , $type ) {
    return null;
  }
  public function import_all( $type , $competition_id ) {
    $data = new importAPI( $type , $competition_id );
    //var_dump($data);
    return $data->get_data();
  }
  protected function checkIfExists( $type , $id ) {
    //echo $id;
    //echo $type;
    $isInDB = get_posts(array(
        'numberposts' => 1,
        'post_type' => $type , 
        'meta_key'   => 'api_id',
        'meta_value' => $id,
    ));
    return $isInDB;
  }
}


/*
  public function remove_all( $competition_id ) {
    //echo $competition_id;
    if ( $this->type == 'competition' ) {
      $allposts= get_posts( array( 
        'post_type' => $this->type , 
        'numberposts' => -1, 
      ));
    }
    else if ( $this->type == 'team' ) {
      $allposts= get_posts( array(
        'post_type' => $this->type ,
        'numberposts' => -1,
        'meta_key'   => 'team_competition',
        'meta_value' => $competition_id
      ));
    }
    else if ( $this->type == 'player' ) {
      $tax = 'player_competition'; 
      $allposts= get_posts( array(
        'post_type' => $this->type ,
        'numberposts' => -1,
        'tax_query' => array(
          array(
              'taxonomy' => $tax,
              'field' => 'name',
              'terms' => $competition_id,
              'operator' => 'IN'
          )
        )
        ) 
      );
    }
    foreach ($allposts as $eachpost) {
        wp_delete_post( $eachpost->ID, true );
    }
  }
  */
  
  ?>

