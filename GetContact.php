<!DOCTYPE html>
<html>
<head>
	<title>Send</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php


	if(isset($_POST["btnsubmit"]))
	{
		
		$fristname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		
		if(!empty($_POST["country"]))
		{
			$country = $_POST["country"];
		}
		
		$subject = $_POST["subject"];
		
	try {

    	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$bulk = new MongoDB\Driver\BulkWrite;
		
		$doc = ['_id' => new MongoDB\BSON\ObjectID, 'fristname' => $fristname, 'lastname' => $lastname, 'country' => $country, 'subject' => $subject];
		
		$bulk->insert($doc);
		
		$mng->executeBulkWrite('SSwebDb.contact', $bulk);
		
		echo '<script type="text/javascript">
        		swal({
            		title: "Successfull",
            		text: "Successfully Send",
            		icon: "success",
            		buttons: false,
        		});
            		window.setTimeout(function(){
                
            		window.location.href="Contact us.html";
                    
            		}, 3000);
                          
        		</script>';
		
		
		
		} catch (MongoDB\Driver\Exception\Exception $e) {

    		$filename = basename(__FILE__);
    
    		echo "The $filename script has experienced an error.\n"; 
    		echo "It failed with the following exception:\n";
    
    		echo "Exception:", $e->getMessage(), "\n";
    		echo "In file:", $e->getFile(), "\n";
    		echo "On line:", $e->getLine(), "\n";    
		}
	
	}
		
	
?>
