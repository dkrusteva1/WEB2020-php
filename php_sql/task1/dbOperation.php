<?php

function query()
{
    $host="localhost";
    $db="www";
    $user="root";
    $password="";
    $conn  = new PDO("mysql:host=$host; dbname=$db", $user, $password);
          $courseTitle = $_POST['title'];
          $name = $_POST['name'];
          $description = $_POST['description'];
          $stmt = $conn->prepare("INSERT INTO electives (title, description, lecturer) VALUES (:courseTitle, :description, :name);");
          $stmt->bindParam(':courseTitle', $courseTitle);
          $stmt->bindParam(':description', $description);
          $stmt->bindParam(':name', $name);
          $stmt->execute();
}

?>