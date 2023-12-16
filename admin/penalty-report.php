<?php include "header.php"; ?>
<?php include "nav/nav.php"; ?>
<?php include "header.php"; ?>
<?php include "nav/nav.php"; ?>
<?php 
require_once "../config/function.php";
$monthlyReport = $conn->getMonthlyReport();

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div id="layoutSidenav_content">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-calendar"></span>
                                Monthly Reports</h1>
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered mytable">
                                        <thead>
                                            <tr>
                                                <th>Month Bracket</th>
                                                <th>Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($monthlyReport as $entry): ?>
                                            <tr>
                                                <td><?= $entry['month']; ?></td>
                                                <td><?= $entry['number']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


</div>


<script>
const ctx = document.getElementById('myChart');
const months = <?= json_encode(array_column($monthlyReport, 'month')); ?>;
const numbers = <?= json_encode(array_column($monthlyReport, 'number')); ?>;

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
            label: months,
            data: numbers,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php include "footer.php";?>
<?php include "footer.php";?>