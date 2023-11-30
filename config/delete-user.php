<?php

  require_once "function.php";

  if(ISSET($_POST)){

  	  $conn = new class_php();
        $id = ($_POST['id']);

        $del = $conn->delete_user($id);
         
        if($del == TRUE){
            echo "<div class='alert alert-danger' role='alert' id='msg'>Deleted Successfully</div><script> setTimeout(function(){location.replace('manage-user.php');}, 1000);</script>";
            }else{
              echo "<div class='alert alert-danger' role='alert' id='msg'>Delete Failed</div><script> setTimeout(function(){location.replace('add-user.php');}, 1000);</script>";
            }


     }

 ?>