<?php session_start();
$useremail = $_SESSION["email"];
if(!isset($useremail))
{
	header('Location:index.html');
}

try {

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$femail=['email'=>$useremail];
	$options=[];
    
    $query = new MongoDB\Driver\Query($femail);
		
    $rows = $mng->executeQuery("SSwebDb.user", $query);
    
    foreach ($rows as $row) {
    
        $fname = $row->fname;
		$lastname = $row->lastname;
		$phone = $row->phone;
		$email = $row->email;
		$password = $row->password;
		$bdate = $row->bdate;
		$ID = $row->ID;
		$address = $row->address;
		$gender = $row->gender;
		$service = $row->service;
    }
    
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:\n";
    
    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";       
}



?>

<html>
<head>
<meta charset="utf-8">
<title>My Account</title>
<link rel="stylesheet" type="text/css" href="myaccount.css"/>
</head>

<body>
<form action="UpdateUser.php" method="post">	
<table width="1222" height="805" border="0" align="center">
  <tbody>
    <tr>
      <td height="49" colspan="7">
		  <form id="form1" name="form1" method="post">
		  <div class="logo"><img src="Pictures/logo.png" width="200" height="41.625" alt=""/></div>
          <input type="button" name="button" id="button" onclick="document.location='Sign up.html'" value="Sign up">
          <input type="button" name="button2" id="button2" onclick="document.location='Login.html'" value="Log in">
	    </form></td>
    </tr>
    <tr>
		  <td width="195" height="33">&nbsp;</td>
		  <td width="152" align="center" bgcolor="#F1F1F1"><div class="tabs"><a href="index.html">Home</a></div></td>
	  	  <td width="153" align="center" bgcolor="#F1F1F1"><div class="tabs"><a href="About us.html">About Us</a></div></td>
		  <td width="167" align="center" bgcolor="#F1F1F1"><div class="tabs"><a href="Pricing.html">Pricing</a></div></td>
		  <td width="156" align="center" bgcolor="#F1F1F1"><div class="tabs"><a href="Contact us.html">Contact us</a></div></td>
		  <td width="166" align="center" bgcolor="#F1F1F1"><div class="tabs"><a href="Login.html">My account</a></div></td>
		  <td width="197">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="7"><br><br><h2>My Profile</h2></td>
    </tr>
    <tr>
      <td height="440" colspan="7">
	 
	  <p>Frist Name : <input type="text" name="txtFristName" id="txtFristName" value="<?php echo $fname; ?> ">
      <br><br> Last Name : <input type="text" name="txtLastName" id="txtLastName" value="<?php echo $lastname; ?>">
      <br><br> Mobile Number : <input type="text" name="txtPhone" id="txtPhone" value="<?php echo $phone; ?>">  
	  <br><br> Email : <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $email; ?>">  
	  <br><br> Account Password : <input type="text" name="txtPassword" id="txtPassword" value="<?php echo $password; ?>">   
	  <br><br> Birth Day : <input type="date" name="Bdate" id="Bdate" value="<?php echo $bdate; ?>">  
	  <br><br> National Id Number : <input type="text" name="txtID" id="txtID" value="<?php echo $ID; ?>"> 
	  <br><br> Address : <input type="text" name="txtAddress" id="txtAddress" value="<?php echo $address; ?>"> 
	  <br><br> Gender : <input type="text" name="txtgender" id="txtgender" value="<?php echo $gender; ?>"> 
	  <br><br> Service Type : <input type="text" name="txtservice" id="txtservice" value="<?php echo $service; ?>"> 
	   </p></td>
    </tr>
    <tr>
      <td height="40" colspan="7" bgcolor="#FFFFFF"><form name="form2" method="post" action="">
      </form><br><br>
      <input type="submit" name="btnsubmit" id="btnsubmit" value="Comform" class="btn"></td>
    </tr>
    <tr>
      <td height="68" colspan="7" bgcolor="#464646"><div class="p1"><p class="pfoot">All Rights Reserved. © 2021 | LakDew</p></div></td>
    </tr>
  </tbody>
 </form> 
</table>
</body>
</html>


