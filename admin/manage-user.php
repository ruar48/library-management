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
                            <tr>
                                <td class="text-center">
                                    <img src="assets/img/images.png" class="table-image"
                                        style="width: 50px;height: 50px;">
                                </td>

                                <td>Ruar</td>

                                <td>ruar@gmail.com</td>
                                <td>20</td>
                                <td>male</td>
                                <td><span class="badge bg-success">active</span></td>
                                <td>

                                    <a href="#" class="btn  btn-md btn-transparent"><i
                                            class="fas fa-pen text-warning"></i></a>
                                    <a href="#" class="btn btn-transparent btn-md"><i
                                            class="fas fa-trash text-danger"></i></a>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>


</div>



<?php include "footer.php";?>