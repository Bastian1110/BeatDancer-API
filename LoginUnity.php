<?php
    if($_POST){
        $data = $_POST["dataPacket"];
        $dataJson = json_decode($data, true);

        $usernameLog = $dataJson["name"];
        $passwordLog = $dataJson["password"];
        
        $servername = "localhost"; //Chamge for the server MySQL config
        $username = "phpmyadmin";
        $password = "2022BeatDancer";
        $dbname = "BeatDancer";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $userCheck = "SELECT * FROM Player WHERE username = '$usernameLog' AND pswd = '$passwordLog'";
        $rs = mysqli_query($conn,$userCheck);
        $existent = mysqli_fetch_array($rs, MYSQLI_NUM);
        if(is_null($existent)){
            echo "Failed";
        }
        else{
            echo "Success";
        }
    }
?>