<?php include "header/header.php"; ?>
<?php include "nav/nav.php"; ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><i class="fas fa-user-plus"></i>&nbsp; Add Books</h3>
            <ol class="breadcrumb mb-4">
                <div id="msg"></div>
                <li class="breadcrumb-item active"></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add Books
                </div>
                <div class="card-body">
                    <div class="row">
                        <form method="post" enctype="multipart/form-data">


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
                                                <span id="photo-error"></span>
                                            </div>
                                        </div>
                                        <div class="row">





                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Book Title</label>
                                                    <input type="text" name="bookTitle" id="bookTitle"
                                                        class="form-control" placeholder="Book Title">
                                                    <span id="bookTitle-error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Author</label>
                                                    <input type="text" name="authorName" id="authorName"
                                                        class="form-control" placeholder="Author">
                                                    <span id="authorName-error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Publish</label>
                                                    <input type="date" name="datePublish" id="datePublish"
                                                        class="form-control">
                                                    <span id="datePublish-error"></span>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Copy</label>
                                                    <input type="number" name="copies" id="copies" class="form-control"
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

                            <div class=" card-footer">
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
<script src="../assets/js/add-book.js">

</script>
<?php require_once "footer/footer.php"; ?>