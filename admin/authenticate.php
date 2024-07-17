<?php

//print_r($_POST);

include('../config.php');

session_start();

if(isset($_POST)){
    
    $user_email = $_POST["user_email"];
    $password = $_POST["password"];

    $sql = "Select pswd from users where user_email = '".$user_email."'";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		  if($password == $row["pswd"]){
			  header('Location: index.html');
			  exit;
		  }else{
			  echo "Incorrect Password";
			  header('Location: login.html');
			  exit;
		  }
	  }
	}
	echo "User not exist";
	header('Location: login.html');

}

// Create database
/* $tbl_query = "Select * from seller";

$result = $conn->query($tbl_query);
$records = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
    //print_r($records);
}
else {
  echo "Error creating table: " . $conn->error;
} */

$conn->close();


?>