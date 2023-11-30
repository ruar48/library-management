<?php include "header.php"; ?>
<?php include "nav/nav.php"; ?>
<?php
require_once('function.php');
$bookData = getallBooks();
?>

<div id="layoutSidenav_content">

  <div class="card m-5">
    <div class="card-header">


      <h1> <i class="bi bi-x" style="font-size: 2em; color: #007bff;"></i> Request Books</h1>
    </div>
    <div class="card-body">

      <div class="mb-3">
        <label for="" class="form-label">Book Name</label>
        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

      </div>
    </div>
    <div class="card-footer text-muted">
      Footer
    </div>
  </div>
</div>


<?php include "footer.php";?>