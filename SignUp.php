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

    $nameCheck="SELECT * FROM Player WHERE username = '$data->name'";
    $rs = mysqli_query($conn,$nameCheck);
    $existent = mysqli_fetch_array($rs, MYSQLI_NUM);
    if($existent[0] > 1){
        echo "Username Already Exists";
    }
    else{
        $sql = "INSERT INTO Player (username, birthdate, country, pswd, mail)
        VALUES ('".$data->name."', '".$data->birthday."', '".$data->country."', '".$data->password."', '".$data->mail."')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
      
    mysqli_close($conn);
?>