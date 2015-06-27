<?php
include_once("dbConnect.php");
	
if(isset($_POST['submit'])){
		
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		
		if($pass1 == $pass2){
			//all good
			$firstname = mysql_real_escape_string($_POST['firstname']);
			$lastname = mysql_real_escape_string($_POST['lastname']);
			$username = mysql_real_escape_string($_POST['username']);
			$pass1 = mysql_real_escape_string($pass1);
			$pass2 = mysql_real_escape_string($pass2);
			$link = mysqli_connect("localhost", "root", "", "kosio");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
			
			$sql = "INSERT INTO kosio1 (id, username, password, firstname,lastname,activated) VALUES (0, '$username', '$pass1', '$firstname','$lastname','1')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

			
		}else{
			echo "Sorry, your passwords do not match.<br>";
			exit();
		}
		
		header('Location:index.php');
		
} else {
	
$form = <<<EOT
<html>
		<head>
			<title>BESTNEWS - Registration</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		</head>
		
		<body>
		<form action = "index.php" align= "right" >
			<input class="button" style ="width:100px; font-size: 17px;;" type = "submit" name = "submit" value = "Login" />
		</form>
	
		<div id="form">
			<form align = "center" action = "register.php" method = "POST">
				<input type = "text" style = "border: 1px solid black;width:154px;height:40px;margin-right:5px;" placeholder = "First Name" name = "firstname" required/>
				<input type = "text" style = "margin-top:2px;border: 1px solid black;width:154px;height:40px;" placeholder ="Last Name" name = "lastname" required/><br>
				<input placeholder = "Username" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "text" name = "username" required/><br>
				<input placeholder = "Password" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "password" name = "pass1" required/><br>
				<input placeholder = "Confirm Password" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;" type = "password" name = "pass2" required/><br><br>
				<input class = "button" type = "submit" value = "Register" name = "submit" />
			</form>	
		</div>
		
		</body>
</html>		
		
	
EOT;
echo $form;	
}
	
	
?>
