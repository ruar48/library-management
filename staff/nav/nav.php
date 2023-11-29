<body class="sb-nav-fixed">
    <style>
    img {
        height: 20%;
        width: 25%;
    }
    </style>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-center" href="index.html">LIBRARY
            <img src="assets/img/images.png" alt="">
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Profile</a></li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-light">Staff</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="manage-books.html"><i class="fas fa-eye"></i>&nbsp; Books</a>
                        <a class="nav-link" href="view-books.html"><i class="fas fa-search"></i>&nbsp; View Borrowed
                            Books</a>
                        <a class="nav-link" href="issue-books.html"><i class="fas fa-sign-out-alt"></i>&nbsp; Return
                            Books</a>
                        <a class="nav-link" href="resume-books.html"><i class="fas fa-file-alt"></i>&nbsp; Request
                            Books</a>

                        <a class="nav-link" href="issued-books.html"><i class="fas fa-check-circle"></i>&nbsp; Issued
                            Books</a>
                        <a class="nav-link" href="penalty-report.html"><i class="fas fa-exclamation-triangle"></i>&nbsp;
                            Penalty Report</a>


                    </div>

            </nav>
        </div>