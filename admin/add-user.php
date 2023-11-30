<?php include "header/header.php"; ?>
<?php include "nav/nav.php"; ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><i class="fas fa-user-plus"></i>&nbsp; Add User</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add Users
                </div>
                <div class="card-body">
                    <div class="row">
                        <div id="msg"></div>
                        <form method="post" enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 bg-opacity-10 bg-success border  border-2"
                                            style="width: 150px;height: 150px;">
                                            <img id="uploadedImage" class="img-fluid" alt="Uploaded Image"
                                                style="width: 100px;height: 100px;">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="photo" class="form-label">Photo Upload</label>
                                                <input type="file" class="form-control form-control-sm" id="photo"
                                                    id="photo" name="photo" onchange="displayImage(this)">
                                                <span id="photo-error"></span>
                                            </div>
                                        </div>
                                        <div class="row">





                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="lastName" class="form-control"
                                                        id="lastName" placeholder="LastName">
                                                    <span id="lastNameError"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="firstName" class="form-control"
                                                        placeholder="First Name" id="firstName">
                                                    <span id="firstNameError"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text" name="middleName" class="form-control"
                                                        placeholder="Middle Name (Optional)" id="middleName">
                                                    <span id="middleNameError"></span>
                                                </div>
                                            </div>




                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" id="email"
                                                        placeholder="Example@gmail.com" name="email">

                                                    <span id="email-error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" id="age" class="form-control"
                                                        placeholder="Enter your Age" name="age">
                                                    <span id="age-error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select id="gender" id="gender" name="gender" class="form-control"
                                                        required>
                                                        <option value="" selected disabled>&larr; Select Gender &rarr;
                                                        </option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <span id="gender-error"></span>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control" placeholder="**********">
                                                    <span id="password-error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Repeat Password</label>
                                                    <input type="password" id="repeat" class="form-control"
                                                        placeholder="Re-Enter Password">
                                                    <span id="reEnterPassword-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="btn-submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
            function displayImage(input) {
                var file = input.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('uploadedImage').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
            </script>



        </div>



    </main>


</div>
</div>
<script>
function displayImage(input) {
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('uploadedImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>
<script src="../assets/js/add-user.js"></script>


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

</html>