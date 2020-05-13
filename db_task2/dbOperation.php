<?php

function getElectiveByID($electiveID){
        $conn=connection();
        $stmt = $conn->prepare("SELECT * FROM electives WHERE id=:idPlaceholder limit 1;");
        $stmt->bindParam(':idPlaceholder', $electiveID);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;
}


function updateElectiveByID($electiveID){
        $conn=connection();
        $courseTitle = $_POST['title'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stmt=$conn->prepare("UPDATE electives SET title=:titlePlaceholder, description=:descriptionPlaceholder, lecturer=:lecturerPlaceholder WHERE id=:idPlaceholder;");
        $stmt->bindParam(':idPlaceholder', $electiveID);
        $stmt->bindParam(':titlePlaceholder', $courseTitle);
        $stmt->bindParam(':descriptionPlaceholder', $description);
        $stmt->bindParam(':lecturerPlaceholder', $name);
        $stmt->execute();
        $conn = null;
}

function addElective (){
        $conn=connection();
        $courseTitle = $_POST['title'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stmt = $conn->prepare("INSERT INTO electives (title, description, lecturer) VALUES (:courseTitle, :description, :name);");
        $stmt->bindParam(':courseTitle', $courseTitle);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $conn = null;

}

function connection(){

        $host="localhost";
        $db="www";
        $user="root";
        $password="";
        $conn  = new PDO("mysql:host=$host; dbname=$db", $user, $password);
        return $conn;
}

?>