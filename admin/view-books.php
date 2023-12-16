<?php include "header.php"; ?>
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
                                <th>Ref-Id</th>
                                <th>book title</th>
                                <th>Author</th>
                                <th>borrower id</th>
                                <th>date request</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ref-Id</th>
                                <th>book title</th>
                                <th>Author</th>
                                <th>borrower id</th>
                                <th>date request</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <?php 
   
                        require_once "../config/function.php";
                        
                            $conn = new class_php();
                            $getallBooks = $conn->getallBooksReq();
                        ?>
                        <tbody>
                            <?php foreach($getallBooks as $row){ ?>
                            <tr>

                                <td class="text-center">
                                    <?= $row['ref_id'] ;?>
                                </td>
                                <td>
                                    <?= $row['book_title'] ;?>
                                </td>
                                <td>
                                    <?= $row['author'] ;?>
                                </td>
                                <td>
                                    <?= $row['user_id'] ;?>
                                </td>

                                <td>
                                    <?= $row['request_date'] ;?>
                                </td>
                                <td>
                                    <?php 
                                    if ($row['status'] === 'approved') { 
                                        echo "<span class='badge bg-success'>approved</span></td>";
                                    } else if($row['status'] === 'pending'){
                                        echo "<span class='badge bg-danger'>pending</span>";
                                    }else{
                                        echo "<span class='badge bg-info'>returned</span>";

                                    }
                                        ?>
                                </td>
                                <td>

                                    <a href="#!" class="btn btn-sm btn-edit" data-id="<?= $row['request_id']; ?>">
                                        <i class="fas fa-pen text-warning"></i>
                                    </a>


                                    <a href="#!" class="btn btn-sm btn-delete"
                                        data-id="<?php echo $row['request_id'] ;?>"><i
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
<div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-center"><br>
                <h3>Are you sure want to delete this request</h3>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="msg2"></div>
            <div class="card-body">
                <div class="container">

                    <div class="row">
                        <form id="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" id="id" name="id">
                                    </div>
                                    <div class="form-group">
                                        <select name="status" id="status" class="form-control">
                                            <option selected disabled>&larr; Select Status &rarr;</option>
                                            <option value="pending">pending</option>
                                            <option value="approved">approved</option>
                                            <option value="returned">returned</option>

                                        </select>
                                    </div>
                                    <!-- /.card-body -->
                                    <hr>
                                    <div class="card-footer d-flex justify-content-end">


                                        <button type="submit" id="btn-submit"
                                            class="btn btn-primary ml-auto">Save</button>
                                    </div>
                                    <hr>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
$(document).ready(function() {
    $('.btn-edit').click(function() {
        var id = $(this).data('id');
        var status = $(this).closest('tr').find('td:eq(5)').text().trim();
        // Set values for other form elements
        $('#id').val(id);
        $('#status').val(status.toLowerCase());

        // Show the modal
        $('#editModal').modal('show');
    });

    $('#form').submit(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var status = $('#status').val();
        // Create FormData object to send data
        var formData = new FormData();
        formData.append('id', id);
        formData.append('status', status);

        $.ajax({
            url: '../config/edit-req.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            async: false,
            cache: false,
            success: function(res) {
                console.log('==================res===========');
                console.log(res);
                $('#msg2').html(res);
            },
            error: function(res) {
                console.error('Failed Edit:', res);
                alert('Failed');
            }
        });
    });
});



$(document).ready(function() {
    $('.btn-delete').click(function() {
        var id = $(this).data('id');
        $('#delete-id').val(id);
        $('#delete').modal('show');
    });

    // Close the modal when the "Close" button is clicked
    $('#delete .btn-secondary').click(function() {
        $('#delete').modal('hide');

    });


    $('#delete-form').submit(function(event) {
        event.preventDefault();
        var id = $('#delete-id').val();

        // Create FormData object to send data
        var formData = new FormData();
        formData.append('id', id);

        $.ajax({
            url: '../config/delete-req.php',
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


<?php include "footer.php";?>