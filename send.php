<?php
require_once "db.php";


$name = htmlspecialchars($_POST['name']);
$mail = htmlspecialchars($_POST['mail']);
$comm = htmlspecialchars($_POST['comm']);

$mysqli = new mysqli($db['HOST'], $db['USER'], $db['PASSWORD'], $db['DB_NAME']);
$mysqli->query("SET NAMES 'utf8'" );
if($mysqli) {
    $result = $mysqli->query("INSERT INTO `users` (`id`, `name`, `mail`, `comment`) VALUES (NULL, '".$name."', '".$mail."', '".$comm."')");
        echo $name . 's' . $mail . 's' . $comm;
} else {
	echo 3;
}
