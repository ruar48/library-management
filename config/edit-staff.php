<?php

require_once "function.php";

if (isset($_POST)){
    $conn = new class_php();
    $id = $_POST['id'];
    $lastname = ($_POST['lastName']);
    $firstname = ($_POST['firstName']);
    $middlename = ($_POST['middleName']);
    $email = ($_POST['email']);
    $age = ($_POST['age']);
    $gender = ($_POST['gender']);
    $role = ($_POST['role']);
    $status = ($_POST['status']);

      // Check if there was an error during file upload
      if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $files = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $photo = "../uploads/" . addslashes($_FILES['photo']['name']);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/library-management/uploads/" . addslashes($_FILES["photo"]["name"]));
    } elseif ($_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
        // Handle the case where no file is uploaded (treat as null value)
        $files = null;
        $photo = null;
    } else {
        echo "File upload error: " . $_FILES['photo']['error'];
        exit;
    }
    $edit = $conn->edit_staff($lastname, $firstname, $middlename, $email, $age, $gender, $role, $status, $photo,$id);

    if($edit == TRUE){
        echo "<div class='alert alert-success' role='alert' id='msg'>Edited Successfully</div><script> setTimeout(function(){location.replace('manage-staff.php');}, 1000);</script>";
        }else{
          echo "<div class='alert alert-danger' role='alert' id='msg'>Edit Failed</div><script> setTimeout(function(){location.replace('add-staff.php');}, 1000);</script>";
        }
}
?>