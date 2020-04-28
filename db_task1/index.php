<?php 
    Include "./dbOperation.php";
    $valid=array();
    $errors=array();
    $maxSizeCourse =128;
    $maxSizeName=128;
    $maxLengthDescription=1024;
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
        validate("description", $maxLengthDescription, $valid, $errors);
    }
        if(isset($_POST['submit']) && count($errors)==0)
        {
          connection();
          echo "Success!";
         }
         else 
         {
             echo "There is invalid input! Please enter the information again!";
             echo '<a href="index.html">Go to homepage</a>';
         }
?>
