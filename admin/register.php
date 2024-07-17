<?php

print_r($_POST);

include('../config.php');

session_start();

if(isset($_POST)){
    
    $first_name = $_POST["first_name"];
    $last_name = $_POST["first_name"];
    $user_email = $_POST["user_email"];
    $password = $_POST["password"];

    $sql = "Insert into users(first_name, last_name, user_email, pswd) values ('".$first_name."', '".$last_name."', '".$user_email."', '". $password ."')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.html');
    } else {
        echo "Error: " . $seller . "<br>" . $conn->error;
    }
    
}

$conn->close();


?>