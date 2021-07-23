<?php
require_once 'app/App.php';
require_once 'configs/database.php';
require_once 'configs/routes.php';

if(!empty($config['database'])){
    $db_config = array_filter($config['database']);

    if(!empty($db_config)){
        require_once('connection.php');
        $conn = Connection::getInstance($db_config);
    }
}

require_once 'core/Controller.php';
require_once 'core/Route.php';
require_once 'configs/conn.php';
