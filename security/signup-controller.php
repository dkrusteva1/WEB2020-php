<?php
include "db-connection.php";

$conn = openCon();

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : false;
$password = isset($_POST['password']) ? $_POST['password'] : false;
$role = isset($_POST['role']) ? $_POST['role'] : false;
if ( strcmp($role, "admin")==0 ) die("You are not authorized to do this.");

if ($firstname && $password && $role)
{
  $email = $conn->prepare("SELECT COUNT(*) FROM person WHERE email = :emailPlaceholder");
  $email->bindParam(':emailPlaceholder', $_POST["email"]);
  $email->execute();
  $result=$email->fetch();
  $count=$result[0];
  if ($count==0){
    $sql = "INSERT INTO person (email, firstname, password, role) values ('"
    . htmlentities($_POST["email"]) . "', '" 
    . htmlentities($_POST["firstname"]). "', '"
    . htmlentities($_POST["password"]) . "', '"
    . htmlentities($_POST["role"]) . "');";
     if (!$conn -> query($sql)) {
        echo("Error description: " . $conn -> error);
    } else {
	      echo("You are registered as: " . $_POST["email"] . " with role: " .  $_POST["role"]);
    }
  }else{
  die("There is already a registered user with this email");
  }
}else{
  echo "Please enter all data";
}
?>



