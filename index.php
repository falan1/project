<?php
require_once "db.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>HoneyHunters</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="scripts.js"></script> 

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
  <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<header>
	<div class= 'content'>
	<div class="row" id="logo">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<img src="img/logo.png">
        </div>
    </div>
    <div class="row" id="icon">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<img src="img/1.png">
        </div>
    </div>
    
    <form>
    	<div>
    	<label>Имя<span> *</span><br><input type="text" name="name" id="name"></label><br>
    	<p class="name_err"></p>
    	<label>E-Mail<span> *</span><br><input type="text" name="mail" id="mail"></label>
    	<p class="mail_err"></p>
    	</div>
    	<div class="textarea">
    	<label style="margin-bottom: 0;">Комментарий<span> *</span><br><textarea name="comm" id="comm"></textarea>
        <p class="comm_err"></p>
    	</label>
    	
    	</div>
    </form>
    <div class="form_button">
        <button type="button" class="btn btn-danger" id="send">Записать</button>
    </div>
    </div>
</header>
<div id="main">
	<div class="content">
		<div class="row">
			<h2 class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Комментарии</h2>
		</div>
        <div id="comments" class="row">
  	    <?php 
		$mysqli = new mysqli($db['HOST'], $db['USER'], $db['PASSWORD'], $db['DB_NAME']);
		$mysqli->query("SET NAMES utf8");
		$result = $mysqli->query("SELECT * FROM `users`");
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        for ($i=0; $i < count($arr); $i++) { 
        	echo "<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-4 comment\">";
        	if($i % 2 == 0) {
                echo "<h4 class=\"head_blue\">".$arr[$i]['name']."</h4>";
        	} else {
        		echo "<h4 class=\"head_green\">".$arr[$i]['name']."</h4>";
        	}
        	echo "<p class=\"comm_body\"><br>";
        	if($i % 2 == 0) {
                echo "<b class=\"mail_blue\">".$arr[$i]['mail']."</b><br><br>";
        	} else {
        		echo "<b class=\"mail_green\">".$arr[$i]['mail']."</b><br><br>";
        	}
        	echo "<span>".$arr[$i]['comment']."</span>";
        	echo "</p></div>";
        } ?>
        </div>
    </div>
</div>

<footer>
	<div class="content">
	    <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            	<img src="img/logo.png">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
            	<span><a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a></span>
            	<span><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
            </div>
        </div>
    </div>
</footer>
</body>
</html>