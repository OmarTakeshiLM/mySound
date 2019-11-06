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
    $db = new DB();
    $query = "SELECT COUNT(*) FROM p5trp7m WHERE p5uss6='".$data['name']."' AND p5mso3=".$data['track']." AND p5wnq8='".$data['user']."'";
    // echo $query;
    // die();
    $res1 = $db->read($query);
    if($res1["COUNT(*)"] > 0) {
        echo 'No puede agregar el mismo track a una misma playlist';
    }else {
        $query = "INSERT INTO p5trp7m (p5uss6, p5mso3, p5wnq8) VALUES ('".$data['name']."', ".$data['track'].", '".$data['user']."');";
        $res = $db->insert($query);
        echo json_encode($res);
    }
    
}else if(isset($_POST['add-track-playlist'])) {
    $data = array(
        "user" => $_SESSION['idu'],
        "name" => $_POST['add-name-playlist'],
        "track" => $_POST['idTrack']
    );
    $db = new DB();
    $query = "SELECT COUNT(*) FROM p5trp7m WHERE p5uss6='".$data['name']."' AND p5mso3=".$data['track']." AND p5wnq8='".$data['user']."'";
    $res1 = $db->read($query);
    if($res1["COUNT(*)"] > 0) {
        echo 'No puede agregar el mismo track a una misma playlist';
    }else {
        $query = "INSERT INTO p5trp7m (p5uss6, p5mso3, p5wnq8) VALUES ('".$data['name']."', ".$data['track'].", '".$data['user']."');";
        $res = $db->insert($query);
        echo json_encode($res);
    }
}