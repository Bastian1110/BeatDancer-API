<?php

function checkUser($conn,$user,$pass){
    $query = "SELECT * FROM Player WHERE username = '$user' AND pswd = '$pass'";

    $result = mysqli_query($conn,$query);
    $existent =  mysqli_fetch_array($result,MYSQLI_NUM);

    if(is_null($existent)){
        echo "Something went wrong";
    }
    else{
        echo "LogIn Succesfull";
    }
}


?>