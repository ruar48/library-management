<?php include "header/header.php"; ?>
<?php include "nav/nav.php"; ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">BOOKS</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <?php  require_once "../config/function.php";
                        
                        $conn = new class_php();
                        $getallBooks = $conn->getallBooks();
                    ?><?php foreach($getallBooks as $row){ ?>
            <div class="container mt-3">

                <div class="card">
                    <div class="card-body">

                        <div class="row">

                            <!-- div 6 1/2-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="<?= $row['photo'] ;?>" style="width:100%;height: 200px;">
                                    </div>

                                </div>
                            </div>

                            <!--end div 6 1/2-->

                            <!-- div 6 1/2-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Book Title</label>
                                                <div class="form-control card-header">
                                                    <?= $row['book_title'] ;?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Author</label>
                                                <div class="form-control">
                                                    <?= $row['author'] ;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <div class="form-control">
                                                    <?= $row['description'] ;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date Publish</label>
                                                <div class="form-control">
                                                    <?= $row['publish_date'] ;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end div 6 1/2-->

                        </div>
                        <div class="mt-2 text-end">
                            <form action="../config/req.php">
                                <input type="hidden" name="id" value="<?= $row['book_id'] ;?>">
                                <input type="hidden" name="author" value="<?= $row['author'] ;?>">
                                <input type="hidden" name="titlr" value="<?= $row['book_title'] ;?>">
                                <button type="submit" id="btn-submit" class="btn btn-primary">Add to borrow</button>
                            </form>
                        </div>

                    </div>

                </div>



            </div>
            <?php } ?>
    </main>

</div>
</div>
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