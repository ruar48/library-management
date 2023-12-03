<?php

  require_once "function.php";

  if(ISSET($_POST)){

  	  $conn = new class_php();

  	    $emailaddress = $_POST['inputName'];
  	    $password = $_POST['inputPassword'];
        $conn->login_user($emailaddress, $password);
   


     }

 ?>