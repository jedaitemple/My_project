<?php
session_start();
include_once("dbConnect.php");
if (isset($_SESSION['id'])) {
	// Put stored session variables into local PHP variable
	$uid = $_SESSION['id'];
	$usname = $_SESSION['username'];
	$result = $usname;
} else {
	$result = "You are not logged in yet";
}
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $usname ;?> - Best news</title>
<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/kosio.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/user.css" media="screen" />
<style type="text/css">
body {
background:  #ffffff url("images/green.jpg") repeat-y;
}
</style>


</head>

<body>
<div class="container">
        <div class="row">
            <div class="twelve columns" id="imenu">
            <div id="nav" class="nine columns">
             <div id="home"><a href="#"><img src="images/tivenews.gif" alt="home"></a></div>                           
     <ul id="nav_menu">
        <li><a href="#">Refresh</a>
             
         </li>
         <li><a href="#">Sort By</a>
         
             
              
            
         </li>
		

       <li><a href="about.php">About</a></li>
        <li><a href="mynews.php">My news</a></li>
		      <li><a href="myprofil.php"><?php echo $result;?></a></li>
			<li><a href="index.php">Logout</a></li>
    </ul>               </div>

                     </div>
     </div>
 </div>

 </body>
 </html>
 <?php

$conn_db = mysql_connect("localhost","root","") or die();
$sel_db = mysql_select_db("kosio",$conn_db) or die();

	if(isset($_POST['change_pwd'])){
		$old_password=$_POST['old_password'];
		$new_password=$_POST['new_password'];
		$con_password=$_POST['con_password'];
		$chg_pwd=mysql_query("select * from kosio1 where username='$usname'");
		$chg_pwd1=mysql_fetch_array($chg_pwd);
		$data_pwd=$chg_pwd1['password'];
			if($data_pwd==$old_password){
				if($new_password==$con_password){
					$update_pwd=mysql_query("update kosio1 set password='$new_password' where username='$usname'");
					$change_pwd_error="Update Sucessfully !!!";
					echo $change_pwd_error;
				}
		else{
			$change_pwd_error="Your new and Retype Password is not match !!!";
			}
		}
		else{
			$change_pwd_error="Your old password is wrong !!!";
			}}
	
	if(isset($_POST['change_email'])){
		$old_email=$_POST['old_email'];
		$new_email=$_POST['new_email'];
		$con_email=$_POST['con_email'];
		$chg_pwd=mysql_query("select * from kosio1 where username='$usname'");
		$chg_pwd1=mysql_fetch_array($chg_pwd);
		$data_pwd=$chg_pwd1['email'];
			if($data_pwd==$old_email){
				if($new_email==$con_email){
					$update_pwd=mysql_query("update kosio1 set email='$new_email' where username='$usname'");
					$change_pwd_error="Update Sucessfully !!!";
					echo $change_pwd_error;
				}
		else{
			$change_pwd_error="Your new and Retype email is not match !!!";
			}
		}	
		else{
			$change_pwd_error="Your old email is wrong !!!";
		}
	}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/kosio.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/user.css" media="screen" />
<div>
    <style scoped>

        .button-success,

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

  

    </style>

</div>

</head>

<body>


<form method="post">
<h1>Change Password</h1>
<input  placeholder="old password" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px; type="password" name="old_password" value="" required ></br>
<input    placeholder="new password"   style = "margin-top:5px;border: 1px solid black;width:317px;height:40px; type="password" name="new_password" value="" required></br>
<input   placeholder="confirm password"   style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;     type="password" name="con_password" value="" required ></br>
<button value="Change" name="change_pwd"  class="button-success pure-button"> Change</button>
</form>


<form method="post">
<h1>change email</h1>
<input placeholder="old email" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px; type="text" name="old_email" value="" required ></br>
<input placeholder="new email"  style = "margin-top:5px;border: 1px solid black;width:317px;height:40px; type="text" name="new_email" value="" required></br>
<input  placeholder="confirm email" style = "margin-top:5px;border: 1px solid black;width:317px;height:40px;    type="text" name="con_email" value="" required ></br>
<button value="Change" name="change_email"  class="button-success pure-button"> Change</button>
</form>
</body>
</html>

