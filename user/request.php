<?php include "header/header.php"; ?>
<?php include "nav/nav.php"; ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">BOOKS</h1>
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
                                    <img src="<?= $row['photo'] ;?>" class="table-image"
                                        style="width: 50px;height: 50px;">
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