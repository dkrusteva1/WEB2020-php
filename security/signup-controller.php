<?php
include "db-connection.php";

$conn = openCon();

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : false;
$password = isset($_POST['password']) ? $_POST['password'] : false;
$role = isset($_POST['role']) ? $_POST['role'] : false;

$Email=$_POST["email"];
$firstname=$_POST["firstname"];
$password=$_POST["password"];
$role=$_POST["role"];

if ($firstname && $password && $role)
{
  if ( strcmp($_POST['role'], "student")!=0 && strcmp($_POST['role'], "teacher") ) die("You are not authorized to do this.");
  $sql="SELECT COUNT(*) FROM person WHERE email = :emailPlaceholder";
  $email = $conn->prepare($sql);
  $email->bindParam(':emailPlaceholder', $_POST["email"]);
  $email->execute();
  $result=$email->fetch();
  $count=$result[0];
  if ($count==0){
    $sql="INSERT INTO person (email, firstname, password, role) values(:emailPlaceholder, :firstnamePlaceholder, :passwordPlaceholder, :rolePlaceholder);";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(":emailPlaceholder", $Email);
    $stmt->bindParam(":firstnamePlaceholder", $firstname);
    $stmt->bindParam(":passwordPlaceholder", $password);
    $stmt->bindParam(":rolePlaceholder", $role);
    $stmt->execute() or die("Failed!");
	  echo("You are registered as: " . $_POST["email"] . " with role: " .  $_POST["role"]);
  }else{
    die("There is already a registered user with this email");
  }
}else{
  echo "Please enter all data";
}
?>



