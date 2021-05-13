<?php
/*
Plugin Name: Footbal Data
Plugin URI: 
Description: A plugin to pull data from football-data.org via API
Version: 1.0
Author: Pedro Figueroa
Author URI: https://www.linkedin.com/in/pedrofigueroa1989/
License: GPL2
*/

require_once('models/api.php');
require_once('models/parent_class.php');
require_once('models/competition.php');
require_once('models/team.php');
require_once('models/player.php');
require_once('views/plugin_interface.php');
require_once('views/metaboxes.php');
require_once('views/admin_columns.php');
require_once('controllers/post_types.php');
require_once('controllers/functions.php');
?>
