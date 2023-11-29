<?php

require_once "function.php";

if (isset($_POST)){
    $conn = new class_php();
    $booktitle = ($_POST['bookTitle']);
    $authurname = ($_POST['authorName']);
    $date = ($_POST['datePublish']);
    $copy = ($_POST['copies']);
    $des = ($_POST['description']);
    $id = $_POST['id'];


    // <=============COMMNENT MUNA============>

    //   // Check if there was an error during file upload
    //   if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
    //     $files = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    //     $photo = "../uploads/" . addslashes($_FILES['photo']['name']);
    //     move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/library-management/uploads/" . addslashes($_FILES["photo"]["name"]));
    // } elseif ($_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
    //     // Handle the case where no file is uploaded (treat as null value)
    //     $files = null;
    //     $photo = null;
    // } else {
    //     echo "File upload error: " . $_FILES['photo']['error'];
    //     exit;
    // }

    // <=============COMMNENT MUNA============>



    
    $edit = $conn->edit_book($booktitle, $authurname, $date,$copy, $des,$id);

    if($edit == TRUE){
        echo "<div class='alert alert-success' role='alert' id='msg'>Edited Successfully</div><script> setTimeout(function(){location.replace('manage-books.php');}, 1000);</script>";
        }else{
          echo "<div class='alert alert-danger' role='alert' id='msg'>Edit Failed</div><script> setTimeout(function(){location.replace('manage-books.php');}, 1000);</script>";
        }
}
?>