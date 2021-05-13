<?php
class MainModels {

  public $imported_data;
  public $type;

  public function __construct( $competition_id ) {
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
?>

