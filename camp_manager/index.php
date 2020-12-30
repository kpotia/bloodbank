<!DOCTYPE html>
<html lang="en">

<?php
if (!isset($_SESSION)) {
    session_start();
}
 

    $unit_cnt = 'SELECT count(*) as unit_count FROM bloodunit';
    $donation_cnt = 'SELECT count(*) as donation_count FROM donation';
    $request_cnt = 'SELECT count(*) as request_count FROM request';

    include_once('connect.php');

$count = [];
  
// var_dump($_SESSION);
$unit_cnt = $conn->query($unit_cnt);
    $unit_cnt = $unit_cnt->fetch_assoc();
    $count = array_merge($count, $unit_cnt);
$donation_cnt = $conn->query($donation_cnt);
    $donation_cnt = $donation_cnt->fetch_assoc();
    $count = array_merge($count, $donation_cnt);

    $request_cnt = $conn->query($request_cnt);
    $request_cnt = $request_cnt->fetch_assoc();
    $count = array_merge($count, $request_cnt);


    // var_dump($count);
   




?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blood Bank 2 </title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'inc/sidebar.php';?>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid py-3">
          <!-- Page Heading -->
          <div class="text-center">
          <h1 class="h3 mb-4 text-gray-800">Welcome to Blood Bank Camp Manager Dashboard </h1>
          <h2><?php echo $_SESSION['BB_MGR']['cp_name'];?></h2>

          </div>
          
          <div class="row">
            

            <div class=" col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Donations</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $count['donation_count'];?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tint fa-2x text-gray-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class=" col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">request</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $count['request_count'];?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class=" col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Units</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $count['unit_count'];?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>




          </div>


        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>