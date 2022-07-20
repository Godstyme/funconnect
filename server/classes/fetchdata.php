<?php
require_once 'dbconnection.php';

class FetchData extends DbConnection {

   public function registerCheckUserEmail($tblName, $email) {
      $sql = "SELECT email FROM {$tblName} WHERE email = :email ";
      $query = $this->connection->prepare($sql);
      $exec = $query->execute(array(':email'=>$email));
      if($query->errorCode() == 0){
         if ($query->rowCount() > 0) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return array('status'=>1,'data'=>$data);
         }else{
            return array('status'=>0);
         } 
      }else {
         return array('status'=>0, 'message'=>$query->errorInfo()); 
      }   
   }

   public function userLogin($email) {
      $sql = "SELECT password,id FROM users WHERE email = :email ";
      $query = $this->connection->prepare($sql);
      $exec = $query->execute(array(':email'=>$email));
      if($query->errorCode() == 0){
         if ($query->rowCount() > 0) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $row) {
               $id = $row['id'];
               $pass = $row['password'];
               return array('status'=>1,'password'=>$pass, 'id'=>$id, 'email'=>$email);
            }
         }else{
            return array('status'=>0,'message' => 'User Does not exist');
         } 
      }else{
         return array('status'=>0, 'message'=>$query->errorInfo()); 
      }  
  }


  public function fetchPostContent() {
   $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
   $query = $this->connection->prepare($sql);
   $exec = $query->execute([]);
   if($query->errorCode() == 0){
      if ($query->rowCount() > 0) {
         $data = $query->fetchAll(PDO::FETCH_ASSOC);
         return $data;
      }else{
         return array('status'=>0,'message' => 'No record found');
      } 
   }else{
      return array('status'=>0, 'message'=>$query->errorInfo()); 
   }  
}


public function getUserUsername(){
   $sql = "SELECT useremail FROM posts WHERE useremail = '{$_SESSION['email']}'";
   $qry = $this->connection->prepare($sql);
   $exec = $qry->execute(array());

   if ($qry->errorCode() == 0) {
      if ($qry->rowCount() > 0) {
            $data = $qry->fetchAll(PDO::FETCH_ASSOC);
            return array('status'=>1,'data'=>$data);
      } else {
            return 0;
      }
   } else {
      return array('status' => 0, 'message' => $qry->errorInfo());
   }
}


}
$data = new FetchData;
// echo json_encode($data->getUserUsername());






?>