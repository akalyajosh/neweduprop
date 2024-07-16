<?php

include('../config.php');

session_start();

if(isset($_POST)){
    
    $sellerName = $_POST["seller_name"];
    $email = $_POST["email"];
    $show_email = isset($_POST["show_email"]) ? $_POST["show_email"] : 0;
    
    $phone_num = $_POST["mobile"];

    $category = $_POST["category"];
    $title = $_POST["title"];
    $price = $_POST["price"];

    $region = isset($_POST["region"]) ? $_POST["region"] : "";
    $city = isset($_POST["city"]) ? $_POST["city"] : "";
    $area = isset($_POST["area"]) ? $_POST["area"] : "";
    $address = isset($_POST["address"]) ? $_POST["address"] : "";


    $seller_query = "Insert into seller(seller_name, seller_email, show_email, phone_num) values ('".$sellerName."', '". $email ."', ". $show_email.", ". $phone_num.")";

    if ($conn->query($seller_query) === TRUE) {
        $seller_id = $conn->insert_id;
        
        $listing_query = "Insert into listing(seller_id, category, title, price, region, city, area, address) values ('".$seller_id."', '". $category ."', '". $title."', ". $price.", '". $region."', '". $city."', '". $area."', '". $address."')";
        
        if ($conn->query($listing_query) === TRUE) {
            $_SESSION['message'] = 'Listing added successfully';
        }else{
            echo "Error: " . $seller . "<br>" . $conn->error;

        }
        echo "New record created successfully";
    } else {
        echo "Error: " . $seller . "<br>" . $conn->error;
    }
    header('Location: ../publish-form.html');
    exit;

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

