<?php 
    $valid=array();
    $error=array();
    $maxSizeCourse =150;
    $maxSizeName=200;
    $minLengthDescription=10;
    $numberFileds=5;
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
        check("group", $valid, $errors);
        check("credits", $valid, $errors);

    }
        if(isset($_POST['submit']) && count($valid)==$numberFileds)
        {
            $courseTitle = $_POST['title'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $group=$_POST['group'];
            $credits = $_POST['credits'];
            $text = $courseTitle . ", " . $name . "," . $description . ", " . $group . ", " . $credits . "\n";
            $fp = fopen('data.txt', 'a+');
            if (fwrite($fp, $text)) 
             {
                echo "The information is saved. Thank you! You will be redirected to the form in 2 seconds!";
                header( "refresh:2; url=forms.html" );
             }
            fclose ($fp);  
         }
         else 
         {
             echo "There is invalid input! Please enter the information again! You will be redirected in 2 seconds!";
             header( "refresh:2; url=forms.html" );
         }
?>
