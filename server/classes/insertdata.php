<?php
require_once 'dbconnection.php';

class InsertData extends DbConnection {
   
    public function registerUsers($firstName,$lastName,$email,$phone,$password,$time,$date) {
        $sql = "INSERT INTO users(firstname,lastname,email,phone,password,time,date) VALUES(?,?,?,?,?,?,?)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute([$firstName,$lastName,$email,$phone,$password,$time,$date]);
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        } 
    }

    public function setPost($userid,$useremail,$post_content_text,$postimage,$time,$date) {
        $sql = "INSERT INTO posts(userid,useremail,post_content_text,postimage,time,date) VALUES(:userid,:useremail,:post_content_text,:postimage,:time,:date)";
  
        $query = $this->connection->prepare($sql);
        $exec = $query->execute([':userid'=>$userid, ':useremail'=>$useremail, ':post_content_text'=>$post_content_text, ':postimage'=>$postimage, ':time'=>$time,  ':date'=>$date ]);
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        } 
    }

}
// $data = new InsertData;
// echo json_encode($data->setPost(1,'Onyibe','gostime@gmail.com','09088','uututu','33'));






?>