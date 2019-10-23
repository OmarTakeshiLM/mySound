<?php
require_once 'lib/DB.php';
use Lib\DB;
session_start();
if(isset($_SESSION['idu']) && !isset($_POST['add-track-playlist'])) {
    $data = array(
        "user" => $_SESSION['idu'],
        "name" => $_POST['name-playlist'],
        "track" => $_POST['idTrack']
    );
    $query = "INSERT INTO p5trp7m (p5uss6, p5mso3, p5wnq8) VALUES ('".$data['name']."', ".$data['track'].", '".$data['user']."');";
    echo $query;
    $db = new DB();
    $res = $db->insert($query);
    echo json_encode($res);
    
}else if(isset($_POST['add-track-playlist'])) {
    $data = array(
        "user" => $_SESSION['idu'],
        "name" => $_POST['add-name-playlist'],
        "track" => $_POST['idTrack']
    );
    $query = "INSERT INTO p5trp7m (p5uss6, p5mso3, p5wnq8) VALUES ('".$data['name']."', ".$data['track'].", '".$data['user']."');";
    $db = new DB();
    $res = $db->insert($query);
    echo json_encode($res);
}