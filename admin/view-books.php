<?php include "header/header.php"; ?>
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/scripts.js"></script>