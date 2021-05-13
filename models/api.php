<?php
class importAPI {

  public $data;

  public function __construct( $type , $competition ) {
    $this->data = $this->callAPI( $type , $competition );
  }
  public function callAPI( $type , $competition ) {

    if ( $type == 'competition' ) {
      $uri = 'http://api.football-data.org/v2/competitions/';
    }
    else if ( $type == 'team' ) {
      $uri = 'http://api.football-data.org/v2/competitions/' . $competition . '/teams';
    }
    else if ( $type == 'player' ) {
      $uri = 'http://api.football-data.org/v2/teams/' . $competition;
    }

    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 45ae655819564e5085024f38f35a2ccc';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $data = json_decode($response);
    //var_dump($data);
    return $data;
  }
  public function get_data() {
    return $this->data;
  }
}
?>