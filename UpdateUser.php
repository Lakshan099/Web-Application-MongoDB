<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
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
		$gender = $_POST["txtgender"];
		$service = $_POST["txtservice"];
		
			
		try {

    	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$bulk = new MongoDB\Driver\BulkWrite;
		
		$bulk->update(['email' => $email], [ '$set' => ['fname' => $fristname, 'lastname' => $lastname, 'phone' => $phone, 'email' => $email, 'password' => $password, 'bdate' => $bdate, 'ID' => $ID, 'address' => $address, 'gender' => $gender, 'service' => $service]]);
		
		$mng->executeBulkWrite('SSwebDb.user', $bulk);
		
		} catch (MongoDB\Driver\Exception\Exception $e) {

    		$filename = basename(__FILE__);
    
    		echo "The $filename script has experienced an error.\n"; 
    		echo "It failed with the following exception:\n";
    
    		echo "Exception:", $e->getMessage(), "\n";
    		echo "In file:", $e->getFile(), "\n";
    		echo "On line:", $e->getLine(), "\n";    
	}
			
		echo '<script type="text/javascript">
        		swal({
            		title: "Successfull",
            		text: "Successfully Update",
            		icon: "success",
            		buttons: false,
        		});
            		window.setTimeout(function(){
                
            		window.location.href="Login.html";
                    
            		}, 3000);
                          
        		</script>';
		
		
	}
			  	
?>
