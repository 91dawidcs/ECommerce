<?php
//include simple test code, utility function to help with test, and file that is being tested

	require_once('.../simpletest/autorun.php');

	require_once('db_tools.php');

	require_once('.../db-interface/db_interface.php');

	class AddCustomerTest extends UnitTestCase{
		
		function testAddCustomer() {
		$email = "saibah@hotmail.com";
		
		//delete all the users with that email adress
		while (customerExists($email)) {
			deleteCustomer($email);
		}
		//call the function that adds a customer to the database
		addCustomer("saibah", $email, "1234");
		
		//check if the customer has been added
		$this->assertTrue(customerExists($email));
		
		//call function to remove the test customer from the database
		deleteCustomer($email);
		
			}
	}
<?