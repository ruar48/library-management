<?php include "header.php"; ?>
<?php include "nav/nav.php"; ?>
<?php  require_once "../config/function.php";
                        
                        $conn = new class_php();
                        $getallFemale = $conn->getallUserCount();
                        $getallMale = $conn->getallUserCountMale();
                        $getallUser = $conn->getallUserCountUsers();
                        $getallBook = $conn->getallUserCountBooks();
                        $getallReqBook = $conn->getallUserCountReq();
                        $getallReqBookPending = $conn->getallUserCountPending();
                        $getallReqBookApproved = $conn->getallUserCountApproved();
                        $getallReqBookReturned = $conn->getallUserCountReturn();



?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total User</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">

                            <h4><?php echo "$getallUser" ?></h4>
                            <a class="small text-white stretched-link" href="#">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">All Books</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4><?php echo "$getallBook" ?></h4>
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Male</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4><?php echo "$getallMale" ?></h4>
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Female</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4> <?php   echo "$getallFemale" ?></h4>

                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">Total Request</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">

                            <h4><?php echo "$getallReqBook" ?></h4>
                            <a class="small text-white stretched-link" href="#">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Pending Request</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4> <?php   echo "$getallReqBookPending" ?></h4>

                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">Approved Request</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4> <?php   echo "$getallReqBookApproved" ?></h4>

                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card text-white mb-4" style="background-color:#fd7e14;">
                        <div class="card-body">Returned Books</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h4> <?php   echo "$getallReqBookReturned" ?></h4>

                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
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