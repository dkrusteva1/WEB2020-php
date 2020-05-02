<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
<a href="index.php"> Take me home, country roads ... </a> <br>
<?php
include "db-connection.php";
$conn = openCon();

$email=$_POST["email"];
$password=$_POST["password"];
$sql = "SELECT * from person where email=:emailPlaceholder AND password=:passwordPlaceholder";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':emailPlaceholder', $email);
$stmt->bindParam(':passwordPlaceholder', $password);
$stmt->execute();
$firstrow = $stmt->fetch(PDO::FETCH_ASSOC) or die ("Not valid credentials.");
echo("Hello " . $firstrow['firstname'] . " you are now logged in.");

session_start();
$_SESSION["email"] = $firstrow['email'];

?>
</body>
</html>
