<?php
session_start();
$name = $_SESSION['naam'];
$text = $_GET['msg'];
$host = 'localhost';
$port = '3306';
$user = 'root';
$pass = '';
$db = 'school';
$dbh = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port, $user, $pass);
// set the PDO error mode to exception
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO comment (user, date, text)
    VALUES ('".$name."' ,NOW() ,'". $text."')";
// use exec() because no results are returned
$dbh->exec($sql);

header('Location: twl.php');