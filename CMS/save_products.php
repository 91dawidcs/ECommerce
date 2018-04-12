<?php
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the customer details 
$productid= filter_input(INPUT_POST, 'productid', FILTER_SANITIZE_STRING);
$productname = filter_input(INPUT_POST, 'productname', FILTER_SANITIZE_STRING);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
$productwidth = filter_input(INPUT_POST, 'productwidth', FILTER_SANITIZE_STRING);
$productheight = filter_input(INPUT_POST, 'productheight', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Construct PHP array with data
$customerData = [
    "productid" => $productid,
    "productname" => $productname,
    "quantity" => $quantity,
    "productwidth" => $productwidth,
    "productheight" => $productheight,
    "description" => $description,
    "price" => $price,
    "_id" => new MongoId($id)
];

//Save the product in the database - it will overwrite the data for the product with this ID
$returnVal = $db->products->save($customerData);
    
//Echo result back to user
if($returnVal['ok']==1){
    header('Location: productData.html') ;
}
else {
    echo 'Error saving customer';
}

//Close the connection
$mongoClient->close();
