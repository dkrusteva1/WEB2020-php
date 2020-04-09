<?php 
    $valid=array();
    $error=array();
    $maxSizeCourse =150;
    $maxSizeName=200;
    $minLengthDescription=10;
    $numberFileds=3;
    function validate ($name, $limit, &$valid, &$errors)
    {
        $check=$_POST["$name"];
        if (!$check)
        {
            $errors["$name"]="$name е задължително поле";
        }
        elseif(strlen("$name")>$limit)
        {
            $errors["$name"]="$name трябва да бъде не повече от $limit символа";
        }
        else
        {
            $valid["$name"]=$check;
        }
    }
    function check ($name, &$valid, &$errors)
    {
        $var=$_POST["$name"];
        if (!$var)
        {
            $errors["$name"]='Полето е задължително';
        }
        else
        {
            $valid["$name"]=$var;
        }
    }
    if ($_POST) 
    {
        validate("title", $maxSizeCourse, $valid, $errors);
        validate("name", $maxSizeName, $valid, $errors);
        $description=$_POST['description'];
        if (!$description)
        {
            $errors['description']='Описанието е задължително поле';
        }
        elseif(strlen($description)<$minLengthDescription)
        {
            $errors['description']="Описанието трябва да бъде не по-малко от 10 символа";
        }
        else
        {
            $valid['description']=$description;
        }

    }
        if(isset($_POST['submit']) && count($valid)==$numberFileds)
        {
          $conn  = new PDO('mysql:host=localhost;dbname=www', 'root', '');
          $courseTitle = $_POST['title'];
          $name = $_POST['name'];
          $description = $_POST['description'];
          $stmt = $conn->prepare("INSERT INTO electives (title, description, lecturer) VALUES (:courseTitle, :description, :name);");
          $stmt->bindParam(':courseTitle', $courseTitle);
          $stmt->bindParam(':description', $description);
          $stmt->bindParam(':name', $name);
          $stmt->execute();
          echo "Success!";
         }
         else 
         {
             echo "There is invalid input! Please enter the information again! You will be redirected in 2 seconds!";
             header( "refresh:2; url=forms.html" );
         }
?>
