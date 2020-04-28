<?php 
    Include 'dbOperation.php';

    define("MAX_LENGTH_TITLE", 128);
    define("MAX_LENGTH_LECTURER_NAME", 128);
    define("MAX_LENGTH_DESCRIPTION", 1024);
    $valid=array();
    $errors=array();
    function validate (String $name, int $limit, &$valid,  &$errors)
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
   
?>
