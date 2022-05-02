<?php
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $servername = "localhost"; //Chamge for the server MySQL config
    $username = "API";
    $password = "12345";
    $dbname = "BeatDancer";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $userCheck = "SELECT * FROM Player WHERE username = '$data->name' AND pswd = '$data->password'";
    $rs = mysqli_query($conn,$userCheck);
    $existent = mysqli_fetch_array($rs, MYSQLI_NUM);
    if($existent[0] > 1){
        echo "LogIn Succesfull";
    }
    else{
        echo "Something went wrong";
    }

  
    

    //SELECT * FROM `Player` WHERE username = "Bastian1110" AND pswd = "123"
?>