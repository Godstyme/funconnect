<?php
session_start();
require_once 'processrequest.php';
require_once 'insertdata.php';
require_once 'fetchdata.php';

$processRequest = new ProcessRequest;
$insertData = new InsertData;
$fetchData = new FetchData;

$time = date('h:i:s  a');
$date = date('d-m-Y');
$requestingPage = stripslashes($_GET['_mode']);

switch ($requestingPage) {   
   case 'userRegistration':
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $fName = $processRequest->processInputData($_POST["fname"]);
         $lName = $processRequest->processInputData($_POST["lname"]);
         $email = $processRequest->processInputData($_POST["email"]);
         $phone = $processRequest->processInputData($_POST["phone"]);
         $password = $processRequest->processInputData($_POST["password"]);
         $confirmPass = $processRequest->processInputData($_POST["cpassword"]);
         if (empty($fName) || (!preg_match("/^[a-z A-Z]*$/", $fName))) {
            $response = array('status'=>0,'input'=>"fname",'message'=>"*Firstname is required and must contain only alphabets");
         }
         elseif (empty($lName) || (!preg_match("/^[a-z A-Z]*$/", $lName))) {
            $response = array('status'=>0,'input'=>"lname",'message'=>"*Lastname is required and must contain only alphabets");
         }
         elseif (empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $response = array('status'=>0,'input'=>"email",'message'=>"*Please enter a valid email address");
         }
         elseif (empty($phone)) {
            $response = array('status'=>0,'input'=>"phone",'message'=>"*Valid Phone Number Is Required");
         }
         elseif (empty($password) || empty($confirmPass)) {
            $response = array('status'=>0,'input'=>"password",'message'=>"*password is required");
         } elseif (strlen($password) < 5) {
            $response = array('status'=>0,'input'=>"password",'message'=>"*Password is too short, Please enter password length of more than 5");
         } elseif ($password != $confirmPass) {
				$response = array('status'=>0,'message'=>" Password Mismatch, Password must match confirm password ");
			} else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $tblName = "users";
            $fetchResponse = $fetchData->registerCheckUserEmail($tblName,$email);
            if (is_array($fetchResponse)) {
               if(isset($fetchResponse['status']) && $fetchResponse['status'] ==1){
                  $response = array('status'=>0,'input'=>"details",'message'=>"A User already exist with this email.");
               } else {
                  $insertResponse = $insertData->registerUsers($fName,$lName,$email,$phone,$password,$time,$date);
                  if ($insertResponse['status']) {
                     $response = array('status'=>1,'input'=>"details",'message'=>"User Registration Successful...");
                  }else {
                     $response = array('status'=>0, 'input'=>"details", 'message'=>$insertResponse['message']);
                  }
               }
            }
         } 
      }
   break;  

   case "login":
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $email = $processRequest->processInputData($_POST["email"]);
         $password = $processRequest->processInputData($_POST["password"]);

         if (empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $response = array('status'=>0,'input'=>"email",'message'=>"*Please enter a valid email address");
         } elseif(empty($password)){
            $response = array('status'=>0,'input'=>"password",'message'=>"*Password is required");
         } else {
            $tblName = "users";
            $fetchResponse = $fetchData->registerCheckUserEmail($tblName,$email);
            if (is_array($fetchResponse)) {
               if(isset($fetchResponse['status']) && $fetchResponse['status'] == 0){
                  $response = array('status'=>0,'input'=>"details",'message'=>"User doesn't exist");
               } else {
                  $fetchResponse = $fetchData->userLogin($email);
                  if(is_array($fetchResponse)){
                     if(isset($fetchResponse['status'])){
                        if ($fetchResponse['status']== "0") {
                           $response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
                        }
                        else if($fetchResponse['status'] == 1){
                           $checkPass = $fetchResponse['password'];
                           $id = $fetchResponse['id'];
                           if (password_verify($password, $checkPass)) {
                              $response = array('status'=>1, 'input'=>"details",'message'=>"Login Successful, Redirecting to your homepage...");
                              $_SESSION['email'] = $email;
                              $_SESSION['id'] = $id;
                           }
                           else{
                              $response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
                           }
                        }
                     }
                  }else{
                     $response =array('status'=>0, 'input'=>"details",'message'=>"User doesn't exist :)");
                  }
               }
            }
         }
      }
   break;

   case "makeapost":
      $userId = $_SESSION['id'];
      $useremail = $_SESSION['email'];
      $postText = $processRequest->processInputData($_POST["textcontent"]);

      $insertResponse = $insertData->setPost($userId,$useremail,$postText,'image',$time,$date);
      if ($insertResponse['status']) {
         $response = array('status'=>1,'input'=>"details",'message'=>"You have successfully make a post");
      }else {
         $response = array('status'=>0, 'input'=>"details", 'message'=>$insertResponse['message']);
      }
      
   break;
   
   default:
      $response=array('status'=>0,'message'=>"Invalid Request, please check what you're doing");
   break;
}

echo json_encode($response);

?>