<?php include "header/header.php"; ?>
<?php include "nav/nav.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>


      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Manage Users
        </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>Photo</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Date Publish</th>
                <th>Copies</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Photo</th>
                <th>Title</th>

                <th>Author</th>
                <th>Description</th>
                <th>Date Publish</th>
                <th>Copies</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <?php 
   
                        require_once "../config/function.php";
                        
                            $conn = new class_php();
                            $getallBooks = $conn->getallBooks();
                        ?>
            <tbody>
              <?php foreach($getallBooks as $row){ ?>
              <tr>

                <td class="text-center">
                  <img src="<?= $row['photo'] ;?>" class="table-image" style="width: 50px;height: 50px;">
                </td>
                <td>
                  <?= $row['book_title'] ;?>
                </td>
                <td>
                  <?= $row['author'] ;?>
                </td>
                <td>
                  <?= $row['description'] ;?>
                </td>
                <td>
                  <?= $row['publish_date'] ;?>
                </td>
                <td>
                  <?= $row['copy'] ;?>
                </td>
                <td><span class="badge bg-success">borrowed</span></td>
                <td>

                  <a href="#" class="btn btn-sm btn-edit" data-id="<?= $row['book_id']; ?>">
                    <i class="fas fa-pen text-warning"></i>
                  </a>


                  <a href="#" class="btn btn-sm btn-delete" data-id="<?php echo $row['book_id'] ;?>"><i
                      class="fas fa-trash text-danger"></i></a>

                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </main>


</div>
</div>
<div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="text-center"><br>
        <h3>Are you sure want to delete this book</h3>
      </div>
      <div class="modal-body text-center ">
        <i class="fas fa-trash text-danger" style="height: 50px; width: 50px;"></i>

        <form id="delete-form">
          <div id="msg"></div>
          <input type="hidden" class="form-control" id="delete-id" name="id">

          <div class="modal-footer d-flex justify-content-end">
            <a href="#" class="btn btn-secondary mr-2" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="msg"></div>
      <div class="card-body">
        <div class="container">

          <div class="row">
            <form method="post" id="form" enctype="multipart/form-data">


              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" id="id">
                    <div class="mb-3 bg-opacity-10 bg-success border  border-2" style="width: 150px;height: 150px;">
                      <img id="uploadedImage" class="img-fluid" alt="Uploaded Image"
                        style="width: 150px;height: 150px;">
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="photo" class="form-label">Photo Upload</label>
                        <input type="file" class="form-control form-control-sm" id="photo" name="photo"
                          onchange="displayImage(this)">
                        <span id="photo-error"></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Book Title</label>
                          <input type="text" name="bookTitle" id="bookTitle" class="form-control"
                            placeholder="Book Title">
                          <span id="bookTitle-error"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Author</label>
                          <input type="text" name="authorName" id="authorName" class="form-control"
                            placeholder="Author">
                          <span id="authorName-error"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Publish</label>
                          <input type="date" name="datePublish" id="datePublish" class="form-control">
                          <span id="datePublish-error"></span>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Copy</label>
                          <input type="text" name="copies" id="copies" class="form-control"
                            placeholder="Enter how many copies ">
                          <span id="copies-error"></span>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Description</label>
                          <textarea name="description" id="description" class="form-control">

                          </textarea>
                          <span id="description-error"></span>
                        </div>
                      </div>





                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
              <hr>
              <div class="card-footer text-end">
                <button class="btn btn-secondary">Cancel</button>
                <button type="submit" id="btn-submit" class="btn btn-primary">Save</button>
              </div>
              <hr>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<script>
  $(document).ready(function () {
    $('.btn-edit').click(function () {
      var id = $(this).data('id');
      var photo = $(this).closest('tr').find('img:first').attr('src');
      var bookTitle = $(this).closest('tr').find('td:eq(1)').text();

      var author = $(this).closest('tr').find('td:eq(2)').text();
      var description = $(this).closest('tr').find('td:eq(3)').text();
      var datePublish = $(this).closest('tr').find('td:eq(4)').text();
      var copies = $(this).closest('tr').find('td:eq(5)').text();



      // Set values for other form elements
      $('#id').val(id);
      $('#uploadedImage').attr('src', photo);
      $('#bookTitle').val(bookTitle);
      $('#authorName').val(author);
      $('#datePublish').val(datePublish);
      $('#copies').val(copies);
      $('#description').val(description);


      // Show the modal
      $('#editModal').modal('show');
    });

    // Close the modal when the "Close" button is clicked
    $('#editModal .btn-secondary').click(function () {
      $('#editModal').modal('hide');
    });
  });
  $(document).ready(function () {
    $('.btn-delete').click(function () {
      var id = $(this).data('id');
      $('#delete-id').val(id);
      $('#delete').show('modal');
    });

    // Close the modal when the "Close" button is clicked
    $('#delete .btn-secondary').click(function () {
      $('#delete').hide('modal');

    });

    $('#delete-form').submit(function (event) {
      event.preventDefault();
      var id = $('#delete-id').val();

      // Create FormData object to send data
      var formData = new FormData();
      formData.append('id', id);

      $.ajax({
        url: '../config/delete-book.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        async: false,
        cache: false,
        success: function (res) {
          console.log('==================res===========');
          console.log(res);
          $('#msg').html(res);
        },
        error: function (res) {
          console.error('Failed Delete:', res);
          alert('Failed');
        }
      });
    });
  });
</script>

<script src="../assets/js/edit-book.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
  crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>