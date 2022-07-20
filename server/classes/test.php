<?php
session_start();
require_once 'processrequest.php';
require_once 'insertdata.php';
$processRequest = new ProcessRequest;
$insertData = new InsertData;
$data = new InsertData;

$time = date('h:i:s  a');
$date = date('d-m-Y');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // $userId = $_SESSION['id'];
   $useremail = $_SESSION['email'];
   $postText = $processRequest->processInputData($_POST["textcontent"]);

   // $insertResponse = $insertData->setPost('userId',$useremail,$postText,'image',$time,$date);
   echo json_encode($insertData->setPost(2,$useremail,$postText,'image',$time,$date));
}
   echo '<br>';

$string = 'String of text that you want to shorten';

// Starts at the beginning of the string and ends after 100 characters 
// echo substr($string, 0, 100).'... <a href="page.php">Read More</a>';








?>