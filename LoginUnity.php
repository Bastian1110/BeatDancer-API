<?php
    if($_POST){
        $data = $_POST["dataPacket"];
        $dataJson = json_decode($data, true);

        $username = $dataJson["name"];
        $password = $dataJson["password"];
        
        $servername = "localhost"; //Chamge for the server MySQL config
        $username = "API";
        $password = "12345";
        $dbname = "BeatDancer";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $userCheck = "SELECT * FROM Player WHERE username = '$username' AND pswd = '$password'";
        $rs = mysqli_query($conn,$userCheck);
        $existent = mysqli_fetch_array($rs, MYSQLI_NUM);
        if(is_null($existent)){
            echo "Something went wrong";
        }
        else{
            echo "LogIn Succesfull";
        }
    }
?>