<?php
require_once "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new class_php();
    $id = ($_POST['user-id']);
    $booktitle = ($_POST['title']);
    $authurname = ($_POST['author']);
    // Generating a random reference ID
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $refId = '';
    $length = 10;

    for ($i = 0; $i < $length; $i++) {
        $refId .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Calling the add_book method to add the book request
    $add = $conn-> req_book($id,$booktitle, $authurname, $refId);

    if ($add == true) {
        echo "<div class='alert alert-success' role='alert' id='msg'>Added Member Successfully</div><script> setTimeout(function(){location.replace('manage-books.php');}, 1000);</script>";
    } else {
        echo "<div class='alert alert-danger' role='alert' id='msg'>Added Member Failed</div><script> setTimeout(function(){location.replace('add-book.php');}, 1000);</script>";
    }
}

?>