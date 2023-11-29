<?php include "header/header.php"; ?>
<?php include "nav/nav.php"; ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><i class="fas fa-user-plus"></i>&nbsp; Add Books</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add Books
                </div>
                <div class="card-body">
                    <div class="row">
                        <form>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 bg-opacity-10 bg-success border  border-2"
                                            style="width: 150px;height: 150px;">
                                            <img id="uploadedImage" class="img-fluid" alt="Uploaded Image"
                                                style="width: 150px;height: 150px;">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="photo" class="form-label">Photo Upload</label>
                                                <input type="file" class="form-control form-control-sm" id="photo"
                                                    name="photo" onchange="displayImage(this)">
                                            </div>
                                        </div>
                                        <div class="row">





                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Book Title</label>
                                                    <input type="text" name="lastName" class="form-control"
                                                        placeholder="Book Title">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Author</label>
                                                    <input type="text" name="firstName" class="form-control"
                                                        placeholder="Author">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Publish</label>
                                                    <input type="date" name="datePublish" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Copy</label>
                                                    <input type="number" name="" class="form-control"
                                                        placeholder="Enter how many copies ">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="" id="" class="form-control">

                                                    </textarea>
                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class=" card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
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