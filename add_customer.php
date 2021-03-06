<?php
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->customers;

//Extract the data that was sent to the server
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$telNumber = filter_input(INPUT_POST, 'telNumber', FILTER_SANITIZE_STRING);


//Convert to PHP array
$dataArray = [
    "name" => $name,
    "password" => $password,
    "email" => $email,
    "telNumber" => $telNumber
 ];

//Add the new product to the database
$returnVal = $collection->insert($dataArray);
    
//Echo result back to user
if($returnVal['ok']==1){
    header( 'Location: login.html' ) ;
}
else {
    echo 'Error adding customer';
}

//Close the connection
$mongoClient->close();





