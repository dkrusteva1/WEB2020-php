<?php

Include 'index.php';

$regex='/[0-9]+/';
$name=basename($_SERVER['REQUEST_URI']);
$fileName='/electives.php/';
if (!preg_match($regex, $name) && !preg_match($fileName, $name))
{
    die("Enter valid path param");
}
$electiveDictionary = getElectiveByID($name);
$isEmptyTitle=$electiveDictionary["title"];
if (!$isEmptyTitle && !preg_match($fileName, $name))
{
    echo "Please enter existing ID!";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    validate('title', MAX_LENGTH_TITLE,  $valid, $errors);
    validate('name', MAX_LENGTH_LECTURER_NAME, $valid, $errors);
    validate('description', MAX_LENGTH_DESCRIPTION, $valid, $errors);
    
    if (empty($isEmptyTitle)){
        if (count($errors)==0){
            addElective();
            echo "You have successfully added new elective!";
        }else{
            echo "Enter valid information, please!";
        }
   }
    else{
        if (count($errors)==0){
            updateElectiveByID($electiveDictionary["id"]);
            echo "You have successfully updated the elective!";
        }else{
            echo "Enter valid information, please!";
        }
    }       
}
?>
  <form method="post">
        <fieldset>
            <legend> Информация за избираемата дисциплина </legend>
            <label for="courseTitle">Име на курса:</label>
            <input id="coursetitle" name="title" required value="<?php echo $electiveDictionary["title"];?>"> </br>
            <label for="teacherName">Име на преподавателя:</label>
            <input id="teacherName" name="name" required value="<?php echo $electiveDictionary["lecturer"];?>"></br>
            <label for="description">Описание на курса:</label>
            <input id="description" name="description" required value="<?php echo $electiveDictionary["description"];?>"></br>
            <input type="submit" name="submit">
        </fieldset>
    </form>

