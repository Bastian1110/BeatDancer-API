<?php
    if($_POST){
        $data = $_POST["userData"];
        $dataJson = json_decode($data, true);
        echo "Json:" . ($dataJson) . "\n";
    }
?>