<style>
.alert {
    border: 2px dashed red;
    padding: 10px;
    margin: 0;
}
.box {
    padding: 0px 20px 20px;
    display: inline-block;
    background: white;
    border: 1px solid #ddd;
    margin: 15px 15px 0 0;
    min-height: 210px;
    width: 30%;
    box-sizing: border-box;
    vertical-align: top;
}
</style>

<?php
function football_interface() { 
    require_once('import_competitions.php');
    require_once('import_teams.php');
    require_once('import_players.php');
    require_once('players_in_compt.php');
    require_once('teams.php');
    require_once('search_teams.php');
    require_once('all_competitions.php');
    require_once('search_competition.php');
    require_once('delete_all.php');
} 
?>