<!DOCTYPE html>
<html lang="en"><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-start{clip:rect(0,auto,auto,0);-ms-zoom:1.0001;}.ng-animate-active{clip:rect(-1px,auto,auto,0);-ms-zoom:1;}</style>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>RKN Black list check for domain or IP</title>
        <meta name="generator" content="Bootply">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <link href="js/bootstrap.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="apple-touch-icon" href="https://www.bootply.com/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://www.bootply.com/bootstrap/img/apple-touch-icon-72x72.png">
 
        <!-- CSS code from Bootply.com editor -->
        
        <style type="text/css">
            @import url(http://fonts.googleapis.com/css?family=Antic+Slab);html,body {  height:100%;}h1 {  font-family: 'Antic Slab', serif;  font-size:80px;  color:#DDCCEE;}.lead {	color:#DDCCEE;}/* Custom container */.container-full {  margin: 0 auto;  width: 100%;  min-height:100%;  background-color:#110022;  color:#eee;  overflow:hidden;}.container-full a {  color:#efefef;  text-decoration:none;}.v-center {  margin-top:7%;}  
        </style>
    
    <!-- HTML code from Bootply.com editor -->

<?php
$servername = "mysql";
$username = "serg";
$password = "n95ow4";
$dbname = "rkn";

// Create connection
$conn = new \mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$RKN = $_POST['RKN'];

//-----RKN empty--------

if ($RKN == "") {
    }
else {


if(filter_var($RKN, FILTER_VALIDATE_IP)) {

    $sqlip = "SELECT * FROM ip_addresses WHERE ip=INET_ATON('$RKN')";
    $resultip = $conn->query($sqlip);

    if ($resultip->num_rows > 0) {
	// output data of each row
	while($row = $resultip->fetch_assoc()) {
	$answer = "IP " . long2ip($row["ip"]) . " заблокирован! <br>";
#        echo "ip: " . long2ip($row["ip"]) . "<br>";
	}
    }
    else {
	$answer = "IP не заблокирован!";
	}
//  echo "IP valid";
}

else {

    $sqld = "SELECT * FROM `domain` WHERE domain LIKE '%$RKN%'";
    $resultd = $conn->query($sqld);


    if ($resultd->num_rows > 0) {
	    // output data of each row
	while($row = $resultd->fetch_assoc()) {
#  echo "!";
	$answer = $answer . "Domain: " . $row["domain"] . "<br>";
	}
    }
    else {
	$answer = "Ничего не нашлось!";
    }
}
}
$conn->close();
?> 

<body>
   <body>
        <div class="container-full">
	    <div class="row">
		<div class="col-lg-12 text-center v-center">
		    <p class="lead">RKN Black list check for domain or IP</p>
		    <br>
		    <form class="col-lg-12" method="POST" action="">
			<div class="input-group input-group-lg col-sm-offset-4 col-sm-4">
			    <input type="text" name="RKN" class="center-block form-control input-lg" title="Enter IP or DOMAIN" placeholder="Enter IP or DOMAIN" required>
			    <span class="input-group-btn"> -->
			    <button class="btn btn-lg btn-primary" type="submit">CHECK</button>
			    </span>
			</div>
		    </form><br>
                    <p class="lead"><br><?php echo $answer ?></p>
		</div>
	</div>
	<!-- /row -->
        <br><br><br><br><br></div>
	<!-- /container full -->
        
        <script async="" src="js/analytics.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/angular.js"></script>
        
        <!-- JavaScript jQuery code from Bootply.com editor  -->
        
        <script type="text/javascript">
        
        $(document).ready(function() {
        });
        
        </script>
</body>

