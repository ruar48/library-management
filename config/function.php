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

      private function getNextPrimaryKey() {
        $stmt = $this->pdo->query("SELECT MAX(CAST(SUBSTRING(`book_id`, 6) AS UNSIGNED)) AS max_num FROM `book_table`");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $nextNumber = $result['max_num'] + 1;
    
        return $nextNumber;
    }
    

      public function add_book($booktitle, $authurname, $date,$copy, $des,$photo) {
    
        $nextNumber = $this->getNextPrimaryKey();
        $bookPrimaryKey = 'book-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
        
      $stmt = $this->pdo->prepare("INSERT INTO `book_table` (`book_id`,`book_title`,`author`, `publish_date`, `copy`, `description`, `photo`) VALUES (?, ?, ?, ?, ?, ?,?)");

      // Execute the query with hashed password
      $true = $stmt->execute([$bookPrimaryKey, $booktitle, $authurname, $date,$copy, $des,$photo]);

      if ($true === true) {
          return true;
      } else {
          // Add error handling
          print_r($stmt->errorInfo());
          return false;
      }
  }


   // get all books
              
   public function getallBooks(){
    $query = $this->pdo->prepare("SELECT * FROM `book_table` ORDER BY CASE WHEN `book_id` = 'book-0000' THEN 0 ELSE 1 END, `book_id` ASC");
    $query->execute();
    return $query->fetchAll();
}



// end get all books


  //delete book


  public function delete_book($id){
          
    $query = $this->pdo->prepare("DELETE FROM `book_table` WHERE book_id  = ?");
    $delete =  $query->execute([$id]);
 if($delete == true){
       return true;
    }else{
      return false;
    }

  }

//end delete book

}


?>