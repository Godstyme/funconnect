<?php
require_once 'processrequest.php';
require_once 'insertdata.php';
$processRequest = new ProcessRequest;
$insertData = new InsertData;
$data = new InsertData;

$time = date('h:i:s  a');
$date = date('d-m-Y');
var_dump($date);
   $postContent = $processRequest->processInputData($_POST["textcontent"]);
   echo $postContent;
   // $postImage = 'jj';
   echo json_encode($insertData->setPost(1,'Onyibe','gostime@gmail.com',$postContent,'uututu','3'));
   echo '<br>';

$string = 'String of text that you want to shorten';

// Starts at the beginning of the string and ends after 100 characters 
echo substr($string, 0, 100).'... <a href="page.php">Read More</a>';








?>