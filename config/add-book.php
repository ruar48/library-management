<?php

  require_once "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conn = new class_php();

  $booktitle = ($_POST['bookTitle']);
  $authurname = ($_POST['authorName']);
  $date = ($_POST['datePublish']);
  $copy = ($_POST['copies']);
  $des = ($_POST['description']);

  
  // Handle file upload
  $files = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
  $photo ="../uploads/". addslashes($_FILES['photo']['name']);
  move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/library-management/uploads/" .   addslashes($_FILES["photo"]["name"]));

  // Call the function to add admin
  $add = $conn->add_book($booktitle, $authurname, $date,$copy, $des, $photo);
  
  if($add == TRUE){
    echo "<div class='alert alert-success' role='alert' id='msg'>Added Member Successfully</div><script> setTimeout(function(){location.replace('manage-staff.php');}, 1000);</script>";
    }else{
      echo "<div class='alert alert-danger' role='alert' id='msg'>Added Member Failed</div><script> setTimeout(function(){location.replace('add-staff.php');}, 1000);</script>";
    }
}
 ?>