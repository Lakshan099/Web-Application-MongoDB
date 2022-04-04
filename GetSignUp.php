<?php


	if(isset($_POST["btnsubmit"]))
	{
		
		$fristname = $_POST["txtFristName"];
		$lastname = $_POST["txtLastName"];
		$phone = $_POST["txtPhone"];
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPassword"];
		$bdate = $_POST["Bdate"];
		$ID = $_POST["txtID"];
		$address = $_POST["txtAddress"];
		
		if(!empty($_POST["select"]))
		{
			$gender = $_POST["select"];
		}
		
		if(!empty($_POST["rdoOption"]))
		{
			$service = $_POST["rdoOption"];
		}
		
		echo $service;
		
	try {

    	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$bulk = new MongoDB\Driver\BulkWrite;
		
		$doc = ['_id' => new MongoDB\BSON\ObjectID, 'fname' => $fristname, 'lastname' => $lastname, 'phone' => $phone, 'email' => $email, 'password' => $password, 'bdate' => $bdate, 'ID' => $ID, 'address' => $address, 'gender' => $gender, 'service' => $service];
		
		$bulk->insert($doc);
		
		$mng->executeBulkWrite('SSwebDb.user', $bulk);
		
		} catch (MongoDB\Driver\Exception\Exception $e) {

    		$filename = basename(__FILE__);
    
    		echo "The $filename script has experienced an error.\n"; 
    		echo "It failed with the following exception:\n";
    
    		echo "Exception:", $e->getMessage(), "\n";
    		echo "In file:", $e->getFile(), "\n";
    		echo "On line:", $e->getLine(), "\n";    
	}
			
		header('Location:Login.html');
		
	}
		
	
?>
