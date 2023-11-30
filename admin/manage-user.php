<?php include "header.php"; ?>
<?php include "nav/nav.php"; ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <h3 class="mt-5 mb-5"><i class="fas fa-user-plus"></i>&nbsp; Manage Users</h3>


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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php 
   
                                require_once "../config/function.php";
                                
                                    $conn = new class_php();
                                    $getallBooks = $conn->getallUsers();
                            ?>
                            <?php foreach($getallBooks as $row){ ?>

                            <tr>
                                <td class="text-center">
                                    <img src="<?= $row['photo'] ;?>" class="table-image"
                                        style="width: 50px;height: 50px;">
                                </td>

                                <td><?= $row['lastname'] . ' ' . $row['firstname'] . ' ' . $row['middlename']; ?></td>


                                <td><?= $row['email'] ;?></td>
                                <td><?= $row['age'] ;?></td>
                                <td><?= $row['gender'] ;?></td>
                                <td><?php 
                                    if ($row['status'] === 'Active') { 
                                        echo "<span class='badge bg-success'>Active</span></td>";
                                    } else {
                                        echo "<span class='badge bg-danger'>Inactive</span>";
                                    }
                                        ?></td>
                                <td>

                                    <a href="#" class="btn btn-sm btn-edit" data-id="<?= $row['user_id']; ?>">
                                        <i class="fas fa-pen text-warning"></i>
                                    </a>


                                    <a href="#" class="btn btn-sm btn-delete"
                                        data-id="<?php echo $row['user_id'] ;?>"><i
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
<<<<<<< HEAD
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
                        <form id="form" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="id" name="id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 bg-opacity-10 bg-success border border-2"
                                            style="width: 150px; height: 150px;">
                                            <img id="imagePreview" class="img-fluid uploadedImage" alt="Image Preview"
                                                style="width: 150px; height: 150px;">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="photo" class="form-label">Photo Upload</label>
                                                <input type="file" class="form-control form-control-sm" id="photoInput"
                                                    name="photo" onchange="displayImage(this)">

                                                <span id="photo-error"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="lastName" id="lastName"
                                                        class="form-control" placeholder="LastName">
                                                    <span id="lastNameError"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="firstName" id="firstName"
                                                        class="form-control" placeholder="First Name">
                                                    <span id="firstNameError"></span>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text" name="middleName" id="middleName"
                                                        class="form-control" placeholder="Middle Name (Optional)">
                                                    <span id="middleNameError"></span>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Example@gmail.com" name="email" id="email">
                                                    <span id="email-error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" class="form-control" placeholder="Enter your Age"
                                                        name="age" id="age">
                                                    <span id="age-error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select id="gender" name="gender" class="form-control" required>
                                                        <option selected disabled>&larr; Select Gender &rarr;
                                                        </option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                    <span id="gender-error"></span>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option selected disabled>&larr; Select Status &rarr;

                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                    <div id="status-error" class="error-message"></div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="btn-submit" class="btn btn-primary">Save changes</button>

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
        var photo = $(this).closest('tr').find('img:first').attr('src');
        var nameParts = $(this).closest('tr').find('td:eq(1)').text().split(' ');
        var lastName = nameParts[0] || "";
        var firstName = nameParts[1] || "";
        var middleName = nameParts[2] || "";
        console.log(lastName, firstName, middleName);
        console.log(nameParts);

        var email = $(this).closest('tr').find('td:eq(2)').text();
        var age = $(this).closest('tr').find('td:eq(3)').text();
        var gender = $(this).closest('tr').find('td:eq(4)').text();
        var status = $(this).closest('tr').find('td:eq(5)').text().trim();
        console.log(gender);
        // Set values for other form elements
        $('#id').val(id);
        $('#imagePreview').attr('src', photo);

        $('#lastName').val(lastName);
        $('#firstName').val(firstName);
        $('#middleName').val(middleName);
        $('#email').val(email);
        $('#age').val(age);
        $('#gender').val(gender);
        $('#status').val(status);

        // Show the modal
        $('#editModal').modal('show');
    });

    // Close the modal when the "Close" button is clicked
    $('#editModal .btn-secondary').click(function() {
        $('#editModal').modal('hide');
    });
});

$(document).ready(function() {
    $('.btn-delete').click(function() {
        var id = $(this).data('id');
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
            url: '../config/delete-user.php',
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
<script src="../assets/js/edit-user.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
=======
>>>>>>> 4321eda2e1320509c2eece573f338217dd2281fb



<?php include "footer.php";?>