<?php
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->admin;

//Extract the data that was sent to the server
$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [

    "email" => $email,
    "password" => $password,

 ];

//Add the new product to the database
$returnVal = $collection->insert($dataArray);
    
//Echo result back to user
if($returnVal['ok']==1){
    echo 'ok' ;
}
else {
    echo 'Error adding admin';
}

//Close the connection
$mongoClient->close();





