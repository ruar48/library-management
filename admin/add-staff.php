<?php include "header.php"; ?>
<?php include "nav/nav.php"; ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><i class="fas fa-user-plus"></i>&nbsp; Add Staff</h3>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add Staff
                </div>
                <div class="card-body">
                    <div id="msg"></div>
                    <div class="row">
                        <form method="post" enctype="multipart/form-data">

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
                                                <input type="file" class="form-control form-control-sm" id="photo"
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
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <span id="gender-error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <select id="role" name="role" class="form-control" required>
                                                        <option selected disabled>&larr; Select Role &rarr;
                                                        </option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Staff">Staff</option>
                                                    </select>
                                                    <span id="role-error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control" placeholder="**********">
                                                    <span id="password-error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
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
            document.getElementById('photo').value = null;

            function displayImage(input) {
                var file = input.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
            </script>




        </div>



    </main>


</div>

<script src="../assets/js/add.js"></script>

<?php include "footer.php"; ?>