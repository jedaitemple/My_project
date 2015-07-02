<?php
session_start();

if (isset($_SESSION['id'])) {
	// Put stored session variables into local PHP variable
	$uid = $_SESSION['id'];
	$usname = $_SESSION['username'];
	$result = ": <br /> Username: ".$usname. "<br /> Id: ".$uid;
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

</head>

<body>
<div class="container">
        <div class="row">
            <div class="twelve columns" id="imenu">
            <div id="nav" class="nine columns">
             <div id="home"><a href="#"><img src="http://4.bp.blogspot.com/-btThtilNthE/T6dLHDZq9tI/AAAAAAAAAiw/E6bSVbOCeH4/s320/home.png" alt="home"></a></div>                           
     <ul id="nav_menu">
        <li><a href="#">Refresh</a>
             
         </li>
         <li><a href="#">Mark all as read</a>
             <ul>
                 <li><a href="#">By category</a>
                     <ul>
                         <li><a href="#">Front Page</a></li>
                         <li><a href="#">Blog Blocks</a></li>
                         <li><a href="#">Pinboard</a></li>
                         <li><a href="#">Press Reliese</a></li>
                     </ul>
                 </li>
                 <li><a href="#">By tag name</a>
                     <ul>
                         <li><a href="#">captcha</a></li>
                         <li><a href="#">gallery</a></li>
                         <li><a href="#">animation</a></li>
                     </ul>
                 </li>
             </ul>
         </li>
		 

         <li><a href="#">About</a></li>
         <li><a href="#">Show History</a></li>
         <li><a href="#">My profile</a></li>
    </ul>               </div>
                            <div class="three columns">

 <form method="get" class="searchform">
     <div id="magnify"><img src="http://1.bp.blogspot.com/-Z-PCrVPeUKk/T6dLVTq-8ZI/AAAAAAAAAi8/n2DMxFGILwE/s320/magnify.png" alt="magnify"></div>
     <div><input name="s" class="s" value="Search" id="searchsubmit" onfocus="if (this.value == 'Search') this.value = '';" type="text"></div>
     <div><input class="searchsubmit" value="" type="submit"></div>
 </form>          


 </div>
                     </div>
     </div>
 </div>
 
 <?php
	echo $result;
?>
</body>

</html>
