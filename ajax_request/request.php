<?php

$jsonStr=file_get_contents('php://input');
$jsonArray=json_decode($jsonStr);
var_dump($jsonArray);
?>