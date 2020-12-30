<!DOCTYPE html>
<html lang="en">

<?php
if (!isset($_SESSION)) {
    session_start();
}
    if(isset($_SESSION) && !isset($_SESSION['BB_ADMIN'])){
        ?>
<script type="text/javascript">
  alert('you are not allow to access this page');
  window.location = 'login.php';
</script>
<?php
    }

    $camp_cnt = 'SELECT count(*) as camp_count FROM camp';
    $member_cnt = 'SELECT count(*) as user_count FROM users';
    $unit_cnt = 'SELECT count(*) as unit_count FROM bloodunit';
    $donation_cnt = 'SELECT count(*) as donation_count FROM donation';
    $request_cnt = 'SELECT count(*) as request_count FROM request';

    include_once('connect.php');

$count = [];
    $camp_cnt = $conn->query($camp_cnt);
    $camp_cnt = $camp_cnt->fetch_assoc();
    $count = array_merge($count, $camp_cnt);
    $member_cnt = $conn->query($member_cnt);
    $member_cnt = $member_cnt->fetch_assoc();
    $count = array_merge($count, $member_cnt);
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

<?php include 'inc/head.php';?>

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
          <h1 class="h3 mb-4 text-gray-800">Welcome to Blood Bank Admin Panel</h1>

          <div class="row">
            <div class=" col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Camps</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $count['camp_count'];?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-campground fa-2x text-gray-600"></i>
                      <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Members</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $count['user_count'];?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-500"></i>
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
     
     
<?php include 'inc/footer.php';?>
      </html>