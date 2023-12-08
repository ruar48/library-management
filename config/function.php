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

        //login
        public function login_user($emailaddress, $password) {
          session_start();
      
          $stmt = $this->pdo->prepare("
              SELECT * FROM `admin_table`
              WHERE `email` = :umail AND `role` IN ('Admin', 'Staff')
          ");
          $stmt->execute(array(':umail' => $emailaddress));
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
          $stmt1 = $this->pdo->prepare("
              SELECT * FROM `usertable`
              WHERE `email` = :umail AND `role` = 'User'
          ");
          $stmt1->execute(array(':umail' => $emailaddress));
          $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
      
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);
      
          if ($row1 && password_verify($password, $row1['password'])) {
              $_SESSION['user_id'] = htmlentities($row1['user_id']);
              $_SESSION['logged_in'] = true;
              echo '3'; // Indicate 'User' role
          } elseif ($row && password_verify($password, $row['password']) && $row['role'] == 'Staff') {
              $_SESSION['userid2'] = htmlentities($row['user_id']);
              $_SESSION['logged_in2'] = true;
              echo '2'; // Indicate 'Staff' role
          } elseif ($row && password_verify($password, $row['password']) && $row['role'] == 'Admin') {
              $_SESSION['userid3'] = htmlentities($row['user_id']);
              $_SESSION['logged_in3'] = true;
              echo '1'; // Indicate 'Admin' role
          } else {
              echo "<div class='alert alert-danger'>Incorrect Email Address or Password</div>";
          }
      }
      
      
      

     //end login

       // get session ID for admin

       public function fetch_adminsessionId($getsessionID){
             
        $query = $this->pdo->prepare("SELECT * FROM `admin_table` WHERE `user_id` =  ?");
        $query->execute([$getsessionID]);
        return $query->fetchAll();


   }

   // end get session ID for admin 
     // get session ID for admin

     public function fetch_userSessionId($getsessionIDUser){
      $query = $this->pdo->prepare("SELECT * FROM `usertable` WHERE `user_id` = ?");
      $query->execute([$getsessionIDUser]);  // Remove intval() here
      return $query->fetchAll();
  }
  
  

 // end get session ID for admin 

  
    
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

// edit book

public function edit_book($booktitle, $authurname, $date,$copy, $des,$id){
  $query = "UPDATE `book_table` SET `book_title` = ?, `author` = ?, `publish_date` = ?, `copy` = ?, `description` = ? WHERE `book_id` = ?";
  $update = $this->pdo->prepare($query)->execute([$booktitle, $authurname, $date,$copy, $des,$id]);
  
  if($update == true){
      return true;
  } else {
      return false;
  }
}

// end edit book


// start add user
private function getNextPrimaryKeyForUser() {
  $currentYear = date('Y');
  $stmt = $this->pdo->query("SELECT MAX(CAST(SUBSTRING(`user_id`, 10) AS UNSIGNED)) AS max_num FROM `usertable` WHERE `user_id` LIKE 'user-$currentYear%'");
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $nextNumberUser = $result['max_num'] + 1;

  return $nextNumberUser;
}

public function add_user($lastname, $firstname, $middlename, $email, $age, $gender, $photo, $password) {
  // Hash the password
$hashpass = password_hash($password, PASSWORD_DEFAULT);

$nextNumberUser = $this->getNextPrimaryKeyForUser();

$currentYear = date('Y');
$nextNumberUser = $this->getNextPrimaryKeyForUser();
$userPrimaryKey = "user-$currentYear-" . str_pad($nextNumberUser, 4, '0', STR_PAD_LEFT);

$stmt = $this->pdo->prepare("INSERT INTO `usertable` (`user_id`,`lastname`, `firstname`, `middlename`, `email`, `age`, `gender`, `photo`, `password`) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)");

// Execute the query with hashed password
$true = $stmt->execute([$userPrimaryKey,$lastname, $firstname, $middlename, $email, $age, $gender, $photo, $hashpass]);

if ($true === true) {
    return true;
} else {
    // Add error handling
    print_r($stmt->errorInfo());
    return false;
}
}

// end add user



   // get all users
              
   public function getallUsers(){
    $query = $this->pdo->prepare("SELECT * FROM `usertable` ORDER BY CASE WHEN `user_id` = 'user-2023-0000' THEN 0 ELSE 1 END, `user_id` ASC");
    $query->execute();
    return $query->fetchAll();
}
// end get all users

//delete book

public function delete_user($id){
          
  $query = $this->pdo->prepare("DELETE FROM `usertable` WHERE user_id  = ?");
  $delete =  $query->execute([$id]);
if($delete == true){
     return true;
  }else{
    return false;
  }

}

//end delete book


// edit user

public function edit_user($lastname, $firstname, $middlename, $email, $age, $gender,$status,$id){
  $query = "UPDATE `usertable` SET `lastname` = ?, `firstname` = ?, `middlename` = ?, `email` = ?, `age` = ?,   `gender` = ?, `status` = ? WHERE `user_id` = ?";
  $update = $this->pdo->prepare($query)->execute([$lastname, $firstname, $middlename, $email, $age, $gender,$status,$id]);
  
  if($update == true){
      return true;
  } else {
      return false;
  }
}

// end edit user

}


?>