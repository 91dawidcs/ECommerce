<?php
	//this function adds a customer to the database 

	function addCustomer($name,$email,$password){
		//connect to database
		$mongoClient = new mongoClient();
		//select a database and collection
		$db = mongoClient->ecommerce;
		$collection = $db->customers;
		
		//convert to a php array
		
		$dataArray = [
			"name" => $name,
			"email" => $email,
			"password" => $password
		]; 
		
		//add a new user to the database
		$returnVal = $collection->insert($dataArray);
		
		//close the connection 
		$mongoClient->close();
		
		//echo the result back to the user
		if($returnVal['ok'] == 1) {
			return 'ok';
		}
		return 'error could not add customer'
	}
<?
