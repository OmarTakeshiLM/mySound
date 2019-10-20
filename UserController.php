<?php
    require_once 'lib/DB.php';
    use Lib\DB;

    function obtenerTracks($usuario) {
        $db = new DB();
        $query = "SELECT * FROM t5fjs0w WHERE t5qwd7=$usuario";
        $reply = $db->read($query);
        // var_dump($reply[0]);
        return $reply;
    }