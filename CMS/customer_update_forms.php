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
$cursor = $db->customers->find($findCriteria);

//Output the results as forms
echo "<h1>Customers</h1>";   
foreach ($cursor as $cust){
    echo '<form action="save_customer.php" method="post">';
    echo 'Name: <input type="text" name="name" value="' . $cust['name'] . '" required><br>';
    echo 'Email: <input type="email" name="email" value="' . $cust['email'] . '" required><br>';
    echo 'Password: <input type="password" name="password" value="' . $cust['password'] . '" required><br>'; 
    echo '<input type="hidden" name="id" value="' . $cust['_id'] . '" required>'; 
    echo '<input type="submit">';
    echo '</form><br>';
}

//Close the connection
$mongoClient->close();