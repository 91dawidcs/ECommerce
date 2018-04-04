<?php
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->products;

//Extract the data that was sent to the server
$productid= filter_input(INPUT_POST, 'productid', FILTER_SANITIZE_STRING);
$productname = filter_input(INPUT_POST, 'productname', FILTER_SANITIZE_STRING);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
$productwidth = filter_input(INPUT_POST, 'productwidth', FILTER_SANITIZE_STRING);
$productheight = filter_input(INPUT_POST, 'productheight', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [

    "productid" => $productid, 
    "productname" => $productname,
    "quantity" => $quantity,
    "productwidth" => $productwidth,
    "productheight" => $productheight, 
    "description" => $description,
    "price" => $price
 ];

//Add the new product to the database
$returnVal = $collection->insert($dataArray);
    
//Echo result back to user
if($returnVal['ok']==1){
    header( 'Location: addproduct.html' ) ;
}
else {
    echo 'Error adding customer';
}

//Close the connection
$mongoClient->close();





