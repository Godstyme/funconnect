<?php
session_start();
require_once 'processrequest.php';
require_once 'insertdata.php';
require_once 'fetchdata.php';
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




// function last_seen($date_time){

//    $timestamp = strtotime($date_time);	
   
//    $strTime = array("second", "minute", "hour", "day", "month", "year");
//    $length = array("60","60","24","30","12","10");

//    $currentTime = time();
//    if($currentTime >= $timestamp) {
// 		$diff     = time()- $timestamp;
// 		for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
// 		$diff = $diff / $length[$i];
// 		}

// 		$diff = round($diff);
// 		if ($diff < 59 && $strTime[$i] == "second") {
// 			return 'Active';
// 		}else {
// 			return $diff . " " . $strTime[$i] . "(s) ago ";
// 		}
		
//    }
// }
// echo last_seen(('12-09-22'));
// echo strtotime("now");

// PHP program to convert timestamp
// to time ago


function timeAgo($time_ago){
   $cur_time 	= time();
   $time_elapsed 	= $cur_time - $time_ago;
   $seconds 	= $time_elapsed ;
   $minutes 	= round($time_elapsed / 60 );
   $hours 		= round($time_elapsed / 3600);
   $days 		= round($time_elapsed / 86400 );
   $weeks 		= round($time_elapsed / 604800);
   $months 	= round($time_elapsed / 2600640 );
   $years 		= round($time_elapsed / 31207680 );
   // Seconds
   if($seconds <= 60){
      echo "$seconds seconds ago";
   }
   //Minutes
   else if($minutes <=60){
      if($minutes==1){
         echo "one minute ago";
      }
      else{
         echo "$minutes minutes ago";
      }
   }
   //Hours
   else if($hours <=24){
      if($hours==1){
         echo "an hour ago";
      }else{
         echo "$hours hours ago";
      }
   }
   //Days
   else if($days <= 7){
      if($days==1){
         echo "yesterday";
      }else{
         echo "$days days ago";
      }
   }
   //Weeks
   else if($weeks <= 4.3){
      if($weeks==1){
         echo "a week ago";
      }else{
         echo "$weeks weeks ago";
      }
   }
   //Months
   else if($months <=12){
      if($months==1){
         echo "a month ago";
      }else{
         echo "$months months ago";
      }
   }
   //Years
   else{
      if($years==1){
         echo "one year ago";
      }else{
         echo "$years years ago";
      }
   }
   }
   $curenttime="2022-07-20 20:23:19";
   $time_ago =strtotime($curenttime);
   echo timeAgo($time_ago);
   echo '<br>';

   $str = 'If a creature with damage transfer is grappling a target, and the grappled target hits the creature, does the target still take half the damage? Is &quot;Occupation Japan&quot; idiomatic? (instead of occupation of Japan, occupied Japan or Occupation-era Japan)';
   if (strlen($str) > 100) {
      // echo mb_substr($str, 0, 100).'... <a href="#" onclick="$(#myId").show();">Read More</a>';
      echo mb_substr($str, 0, 100).'... <button  id = "buttonLogin">Read More</button>';
      // echo '<div style="display:none;" id="myId">'. $str .'</div>';                                 
      
   } else {
      echo substr($str, 0, strlen($str));
   }









?>