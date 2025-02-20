<?php
    include "koneksi.php";
    if(!isset($_SESSION['users'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>My To Do List</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:rgb(0, 0, 0);">
            <a class="navbar-brand" style="padding-left: 20px; color: white; font-weight: bold;">My To Do List</a>
            <div class="ms-auto me-4 d-flex align-items-center">
                <form class="d-flex me-3" role="search">
                    <div class="input-group">
                        <input class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-info btn-sm" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> -->
             
            <!-- <div class="ms-auto me-4 d-flex align-items-center">
                <form class="d-flex me-3" role="search">
                    <div class="input-group">
                        <input class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-info btn-sm" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form> -->
                
                <a href="profile.php"><i class="fa fa-user-circle fa-2x"></i>
                </a>
            </div>
        </nav>
                <div id="layoutSidenav">
                    <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color: rgb(218, 207, 149)">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="?" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Navigasi</div>
                            <a class="nav-link" href="?page=categories" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="?page=tasks" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Tugas
                            <!-- </a>
                            <a class="nav-link" href="logout.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fa fa-power-off"></i></div>
                                Logout
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer" style="background-color:rgb(0, 0, 0)">
                        <!-- <div class="small">Logged in as:</div> -->
                        <!-- <?php echo $_SESSION['users']['nama']; ?> -->
                        <a class="nav-link" href="logout.php" style="color: white;">
                                <div class="sb-nav-link-icon"><i class="fa fa-power-off"></i></div>
                                Logout
                            </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                            if(file_exists($page . '.php')){
                                include $page . '.php';
                            }else{
                                include '404.php';
                            }
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"> &copy; My To Do List 2025</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>