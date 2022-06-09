<?php 
	session_start();

    if($_SESSION['akses']== ""){
        echo '<script>alert("Anda bukan CS, login terlebih dahulu");</script>';
        echo '<script>window.location="login.php";</script>';
    }


	
  
	?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

    <title>SIM Koperasi</title>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Navigasi</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="indexmember.php">SIM Koperasi</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-table"></i> Report Data
                            Form <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown "><a href="indexcs.php?page=datamembercs">Report Data Anggota</a></li>
                            <li><a href="#">Report Data Produk</a></li>
                            <li><a href="#">Report Pinjaman </a></li>
                            <li><a href="#">Report Tabungan </a></li>
                            
                        </ul>
                    </li>
                    

                </ul>

                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                            <?php echo $_SESSION['username']; ?>
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="row">
               <?php
               
               $page = (isset($_GET['page']))? $_GET['page'] : "main";
                switch ($page) {
                    case 'datamembercs' : include "datamembercs.php"; break;
                    case 'main' : 
                    default : include 'dashboard.php';
                }
               
               ?>
            </div><!-- /.row -->
        

        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

</body>

</html>