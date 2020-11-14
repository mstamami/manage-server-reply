<?php
include("lib/db.class.php");
include_once("lib/config.php");
$db = new DB($config['dbnama'], $config['dbhost'], $config['dbuser'], $config['dbpass']);
