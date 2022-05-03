<?php
function conectionBD(){
    $server = "localhost"
    $user = "API"
    $pass = "12345"
    $dataBase = "BeatDancer"


    $connection = new mysqli ($server,$user,$pass,$dataBase);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        return $conn
    }
}

?>