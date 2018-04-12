<?php
	//this function will return true if there is a user with the specific email 
	fucntion customerExists($email){
		 //connect to mongodb
		 $mongoClient = new mongoClient();
		 
		//connect to a database
		$db = mongoClient->ecommerce;
		
		//create a php sacrh criteria e.g. to recognise a specific email
		$findCriteria = [
		"email" => $email,
		];
		
		//find all of the customers with that email
		$cursor = $db->customers->find($findCriteria);
		
		//close connection 
		$mongoClient->close();
		
		//this will return true if a customer with a specific email adress is found
		if($cursor->count() > 0){
			return true;
		}
		return false;
	}
		
		// this function will delete a customer with the specific email adress
		function deleteCustomer ($email){
			
			//connect to mongo db and choose a database 
		$mongoClient = new mongoClient();
		$db = mongoClient->ecommerce;
		
		// make an array to remove the criteria 
		$remCriteria = [
			"email" => $email
		];
		
		// delete the customer document 
		$db->customers->remove($remCriteria);
		
		//close connection
		$mongoClient->close();
			
	}

<?