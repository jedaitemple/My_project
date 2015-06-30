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
<?php
    $ch = curl_init('http://www.espnfc.com/copa-america/83/blog/post/2508492/eduardo-vargas-is-lighting-up-copa-america-for-chile');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36');

    $res = curl_exec($ch);

    if ($res === false) {
        die('error: ' . curl_error($ch));
    }

    curl_close($ch);

    $d = new DOMDocument();
    @$d->loadHTML($res);

    $output = array(
        'title' => '',
    );

    $x = new DOMXPath($d);

    $title = $x->query("//title");
    if ($title->length > 0) {
        $output['title'] = $title->item(0)->textContent;
    }
	
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">







<title><?php echo $usname ;?> - Best news</title>
<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/kosio.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/user.css" media="screen" />
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
 <center>
  <h1>Top News</h1>
 </center>
 
 <br><div id='cssmenu'></br>
<ul>


	<li><a href='#'>Add new News</a></li>
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



 
 <div id="content" name="content" tabindex="1" class="notranslate blur" style="right: 10px;"></br>
<li style="display: inline;" class="keynav withoutfocus">
<div class="press">
<div id="titlebar-5710-0" class="titlebar">
<img src="https://duh8wcwur1xop.cloudfront.net/images/favicon_overlay.png" alt="" align="absmiddle" id="favicon-5710-0" 
class="favicon" 
style="background-image: url(http://espn.go.com/favicon.ico);" data-url="http://espn.go.com/favicon.ico">
<div class="sourcewrapper">
<p id="source-5710-0" class="source" title="Copyright 2015 ESPN Inc.">ESPN.com - Tennis</p></div>
 <class="fa fa-globe icon activityimg" data-original-title=""
 title=""></i></a></div><a id="itemlink-5710-0"
 class="itemlink" href="http://www.espnfc.com/copa-america/83/blog/post/2508492/eduardo-vargas-is-lighting-up-copa-america-for-chile" 
 <span><div class="headlinewrapper"><p id="headline-5710-0"
 class="headline"><?php print_r($output);  ?></p>
 </div><p id="date-5710-0" 
 class="date">15 mins ago</p>
 
 
 

 </body>



 
</html>
