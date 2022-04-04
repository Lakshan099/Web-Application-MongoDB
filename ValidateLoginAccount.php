<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
	session_start();
				
	if(isset($_POST["btnsubmit"]))
	{
		$email = $_POST["txtEmail"];
		$password = $_POST["txtpassword"];
		
			
		try {
     
    			   
    			$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    			$femail=['email'=>$email];
				$options=[];
    
    			$query = new MongoDB\Driver\Query($femail);
		
    			$rows = $mng->executeQuery("SSwebDb.user", $query);

    			foreach ($rows as $row) {
    
        			$Demail = $row -> email;
					$Dpassword = $row -> password;
    			}
    
			} catch (MongoDB\Driver\Exception\Exception $e) {

    			$filename = basename(__FILE__);
    
    			echo "The $filename script has experienced an error.\n"; 
    			echo "It failed with the following exception:\n";
    
    			echo "Exception:", $e->getMessage(), "\n";
    			echo "In file:", $e->getFile(), "\n";
    			echo "On line:", $e->getLine(), "\n";       
			}
		
			if(($email == $Demail) && ($password == $Dpassword))
			{
				$_SESSION["email"] = $email;
				header('Location:myaccount.php');
			}
			else
			{
				echo '<script type="text/javascript">
        		swal({
            		title: "Invalid Credentials",
            		text: "Please Try Again",
            		icon: "error",
            		buttons: false,
        		});
            		window.setTimeout(function(){
                
            		window.location.href="Login.html";
                    
            		}, 3000);
                          
        		</script>';
			}
		
	
		}
			  	
?>