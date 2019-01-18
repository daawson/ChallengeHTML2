<?php
$host = 'localhost';
$port = '3306';
$user = 'root';
$pass = '';
$db = 'school';
$dbh = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port, $user, $pass);
$login = $_GET['email'];
$passw = $_GET['password'];
$sql = "SELECT id, email, password FROM users WHERE id =0 and email =? and password =?";
$query = $dbh->prepare($sql);
$query->execute(array($login,$passw));
if($query->rowCount() >= 1) {
    session_start();
    if($login == "piet@worldonline.nl") {
        $_SESSION['role'] = 'admin';
    }else{
        $_SESSION['role'] = 'guest';
    }
    $_SESSION['naam'] = $login;
    header("Location: index.php");
}else{
    header("Location: login.php");
}