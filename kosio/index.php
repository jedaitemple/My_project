<?php
session_start();
 
if (isset($_POST['username'])) {
        
	include_once("dbConnect.php");
	
        $usname = strip_tags($_POST['username']);
	$paswd = strip_tags($_POST['password']);
	
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	
	
	$sql = "SELECT id, username, password FROM kosio1 WHERE username = '$usname' AND activated = '1' LIMIT 1";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$dbUsname = $row[1];
	$dbPassword = $row[2];
	
	
	if ($usname == $dbUsname && $paswd == $dbPassword) {
		$_SESSION['username'] = $usname;
		$_SESSION['id'] = $uid;
		header("Location: user.php");
	} else {
		echo "<h2>Oops that username or password combination was incorrect.
		<br /> Please try again.</h2>";
	}
	
}
?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Basic login system</title>
<link rel="stylesheet" type="text/css" href="css/mystyles.css" media="screen" />


<style type="text/css">
body {
    background:  #ffffff url("images/green.jpg") no-repeat;
}

</style>


</head>
<body>

<div id="wrapper">


<center>
<h4>Best-News helps you to find the news faster in one place and share to the social sites</h4>
</center>
<center>
<div class="container"> <!-- Unnecessary tag -->
    <div class="form">
        <div class="header">
            Member Login
        </div>
        <div class="body">
            <form id="form" action="index.php" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="Username" name="username"/><br>
                <input type="password" placeholder="Password"  name="password"/><br>
                <input type="submit" value="Login Now" name="Submit"/><br>
			
            </form>
        </div>
    </div>
	<center>
<a href="register.php"><input type="Submit"  value="SING UP" name="Register" ></a>
</center>
</div>
</center>
</body>
</html>