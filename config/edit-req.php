<?php

require_once "function.php";

if (isset($_POST)){
    $conn = new class_php();
    $id = $_POST['id'];
    $status = ($_POST['status']);
    
    $edit = $conn->editBookStatus($status,$id);

    if($edit == TRUE){
        echo "<div class='alert alert-success' role='alert' id='msg2'>Edited Successfully</div><script> setTimeout(function(){location.replace('view-books.php');}, 1000);</script>";
        }else{
          echo "<div class='alert alert-danger' role='alert' id='msg2'>Edit Failed</div><script> setTimeout(function(){location.replace('add-staff.php');}, 1000);</script>";
        }
}
?>