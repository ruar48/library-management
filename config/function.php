<?php

require 'connection.php';

class class_php {
    private $server = DB_HOST;
    private $user   = DB_USER;
    private $pass   = DB_PASS;
    private $db     = DB_NAME;
    private $pdo; 

    public function __construct()
    {
         $this->db_connect();
    }
    public function db_connect()//connection OOP PDO
    {
        $this->pdo = null;
      try{
          $this->pdo = new PDO("mysql:host=".$this->server.";dbname=".$this->db, $this->user, $this->pass);
             $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          if(!$this->pdo){
            echo "Error";
              return false;
              
          }	
      }catch(PDOException $e){
         echo $e->getMessage();
         echo "succes";
      }
    }

  
    
    public function add_admin($lastname, $firstname, $middlename, $email, $age, $gender, $role, $photo, $password) {
        // Hash the password
      $hashpass = password_hash($password, PASSWORD_DEFAULT);

      $stmt = $this->pdo->prepare("INSERT INTO `admin_table` (`lastname`, `firstname`, `middlename`, `email`, `age`, `gender`, `role`, `photo`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

      // Execute the query with hashed password
      $true = $stmt->execute([$lastname, $firstname, $middlename, $email, $age, $gender, $role, $photo, $hashpass]);

      if ($true === true) {
          return true;
      } else {
          // Add error handling
          print_r($stmt->errorInfo());
          return false;
      }
  }

       // get all category
              
       public function getallCategory(){
        //$query = $this->pdo->prepare("SELECT * FROM `crud_table` ORDER BY `id`  DESC");
        $query = $this->pdo->prepare("SELECT * FROM `admin_table` ORDER BY CASE WHEN `user_id` = 1 THEN 0 ELSE 1 END, `user_id` ASC");
         $query->execute();
         return $query->fetchAll();

  }


    // end get all category


         // edit category


         public function edit_staff($lastname, $firstname, $middlename, $email, $age, $gender, $role, $status, $photo, $id){
          $query = "UPDATE `admin_table` SET `lastname` = ?, `firstname` = ?, `middlename` = ?, `email` = ?, `age` = ?, `gender` = ?, `role` = ?,`status` = ?, `photo` = ? WHERE `user_id` = ?";
          $update = $this->pdo->prepare($query)->execute([$lastname, $firstname, $middlename, $email, $age, $gender, $role, $status, $photo, $id]);
          
          if($update == true){
              return true;
          } else {
              return false;
          }
      }
      
      // end edit category

         //delete category


         public function delete_staff($id){
          
          $query = $this->pdo->prepare("DELETE FROM `admin_table` WHERE user_id  = ?");
          $delete =  $query->execute([$id]);
       if($delete == true){
             return true;
          }else{
            return false;
          }

        }

      //end delete category
}


?>