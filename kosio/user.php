<?php
session_start();

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
<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />

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
         
                 
                     <ul>
                         <li><a href="#">Front Page</a></li>
                         <li><a href="#">Blog Blocks</a></li>
                         <li><a href="#">Pinboard</a></li>
                         <li><a href="#">Press Reliese</a></li>
                     </ul>
              
            
         </li>
		

         <li><a href="#">About</a></li>
         <li><a href="#">Show History</a></li>
		    <li><a href="#"><?php echo $result;?></a></li>
    </ul>               </div>

		<div class="three columns">

 <form method="get" class="searchform">
     <div id="magnify"><img src="images/m.png" alt="magnify"></div>
     <div><input name="s" class="s" value="Search" id="searchsubmit" onfocus="if (this.value == 'Search') this.value = '';" type="text"></div>
     <div><input class="searchsubmit" value="" type="submit"></div>
 </form>          


 </div>
                     </div>
     </div>
 </div>
 
 <br><div id='cssmenu'></br>
<ul>


	<li><a href='#'>Create new News</a></li>
	   <li><a href='#'>Водещи Новини в България</a></li>
	   <li><a href='#'>Водещи Новини по света</a></li>
   <li><a href='#'>Politics and world</a></li>
   <li class='#'><a href='#'>Business and finace</a>
      <li class='#'><a href='#'>Sports</a>
   <li><a href='#'>Culture and entertainment</a></li>
   <li><a href='#'>Science and Technology</a></li>
     <li><a href='#'> Travel</a></li>
	   <li><a href='#'>Health</a></li>
		  <li><a href='#'>Lifestyle and fashion</a></li>
		 <li><a href='#'>Environment</a></li>
		  <li><a href='#'>Satire</a></li>
		  <li><a href='#'>Comics</a></li>
		  
	   </ul>
</div>
 
 </body>




</html>
