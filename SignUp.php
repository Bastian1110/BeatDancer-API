<?php
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $servername = "localhost"; //Chamge for the server MySQL config
    $username = "phpmyadmin";
    $password = "2022BeatDancer";
    $dbname = "BeatDancer";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $nameCheck="SELECT * FROM Player WHERE username = '$data->name'";
    $rs = mysqli_query($conn,$nameCheck);
    $existent = mysqli_fetch_array($rs, MYSQLI_NUM);
    if(is_null($existent)){
        $sql = "INSERT INTO Player (username, birthdate, country, pswd, mail)
        VALUES ('".$data->name."', '".$data->birthday."', '".$data->country."', '".$data->password."', '".$data->mail."')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        echo "Username Already Exists";
    }
    else{
        echo "Username Already Exists";
    }
      
    mysqli_close($conn);
?>