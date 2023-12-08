<?php

  require_once "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conn = new class_php();
$id=($_POST['id']);
  $booktitle = ($_POST['title']);
  $authurname = ($_POST['author']);


  // Call the function to add admin
  $add = $conn->add_book($booktitle, $authurname, $id);
  
  if($add == TRUE){
    echo "<div class='alert alert-success' role='alert' id='msg'>Added Member Successfully</div><script> setTimeout(function(){location.replace('manage-books.php');}, 1000);</script>";
    }else{
      echo "<div class='alert alert-danger' role='alert' id='msg'>Added Member Failed</div><script> setTimeout(function(){location.replace('add-book.php');}, 1000);</script>";
    }
}
 ?>