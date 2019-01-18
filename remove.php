<?php
$id = $_GET['id'];

$host = 'localhost';
$port = '3306';
$user = 'root';
$pass = '';
$db = 'school';
$dbh = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port, $user, $pass);

$stmt = $dbh->prepare( "DELETE FROM comment WHERE id =:id" );
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: twl.php');