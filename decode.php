<?php
function decode(){
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    return $data
}



?>
