<?php include "header/header.php"; ?>
<?php include "nav/nav.php"; ?>



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
                                <th>Author</th>
                                <th>Description</th>
                                <th>Date Publish</th>
                                <th>Date added</th>
                                <th>Copies</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Photo</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Date Publish</th>
                                <th>Date added</th>
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
                                    <img src="<?= $row['photo'] ;?>" class="table-image"
                                        style="width: 50px;height: 50px;">
                                </td>

                                <td><?= $row['book_title'] ;?></td>

                                <td><?= $row['author'] ;?></td>
                                <td><?= $row['publish_date'] ;?></td>
                                <td><?= $row['copy'] ;?></td>
                                <td><?= $row['description'] ;?></td>
                                <td><span class="badge bg-success">borrowed</span></td>
                                <td>

                                    <a href="#" class="btn btn-sm btn-edit" data-id="<?= $row['book_id']; ?>">
                                        <i class="fas fa-pen text-warning"></i>
                                    </a>


                                    <a href="#" class="btn btn-sm btn-delete"
                                        data-id="<?php echo $row['book_id'] ;?>"><i
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
                <h3>Are you sure want to delete this</h3>
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
<script>
$(document).ready(function() {
    $('.btn-delete').click(function() {
        var id = $(this).data('book_id');
        $('#delete-id').val(id);
        $('#delete').show('modal');
    });

    // Close the modal when the "Close" button is clicked
    $('#delete .btn-secondary').click(function() {
        $('#delete').hide('modal');

    });

    $('#delete-form').submit(function(event) {
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
            success: function(res) {
                console.log('==================res===========');
                console.log(res);
                $('#msg').html(res);
            },
            error: function(res) {
                console.error('Failed Delete:', res);
                alert('Failed');
            }
        });
    });
});
</script>
<?php require_once "footer/footer.php"; ?>