<?php
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search_string ] 
 ];

//Find all of the customers that match  this criteria
$cursor = $db->products->find($findCriteria);

//Output the results as forms
echo "<h1>Products</h1>";   
foreach ($cursor as $cust){
    echo '<form action="save_customer.php" method="post">';
    echo 'productID: <input type="text" name="productid" value="' . $cust['productid'] . '" required><br>';
    echo 'productname: <input type="text" name="productname" value="' . $cust['productname'] . '" required><br>';
    echo 'quantity: <input type="text" name="quantity" value="' . $cust['quantity'] . '" required><br>';
    echo 'productwidth: <input type="text" name="productwidth" value="' . $cust['productwidth'] . '" required><br>';
    echo 'productheight: <input type="text" name="productheight" value="' . $cust['productheight'] . '" required><br>';
    echo 'description: <input type="text" name="description" value="' . $cust['description'] . '" required><br>';
    echo 'price: <input type="text" name="price" value="' . $cust['price'] . '" required><br>';
    echo '<input type="text" name="id" value="' . $cust['_id'] . '" required>'; 
    echo '<input type="submit">';
    echo '</form><br>';
}

//Close the connection
$mongoClient->close();