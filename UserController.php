<?php
    require_once 'lib/DB.php';
    use Lib\DB;

    function obtenerTracks($usuario) {
        $db = new DB();
        $query = "SELECT * FROM t5fjs0w WHERE t5qwd7='$usuario';";
        $reply = $db->readAll($query);
        // var_dump($reply[0]);
        return $reply;
    }

    function obtenerInformacion($usuario) {
        $db = new DB();
        $query = "SELECT u5hwo4,u5asd4,u5ybn4 FROM u5lwe5a WHERE u5wkx0='$usuario';";
        $reply = $db->read($query);
        // var_dump($reply[0]);
        return $reply;
    }