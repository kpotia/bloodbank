<!DOCTYPE html>
<html lang="en">

<?php include_once 'inc/head.php';?>

<body >
<?php include_once 'inc/nav.php';?> 

<?php

$conn = new mysqli('localhost', 'root','','bloodbank1');
$fetchQ = 'SELECT * FROM users where uid = '.$_SESSION['BB_USER']['uid'];
$error = array();
$u_info = $conn->query($fetchQ);
$u_info = $u_info->fetch_assoc();
// var_dump($u_info);

if (isset($_POST['update'])) {

  // var_dump($_POST);

  extract($_POST);

  if($o_pwd == $u_info['password']){
    if($n_pwd == $cn_pwd ){
      
    $conn = new mysqli('localhost', 'root','','bloodbank1');
  $updQ = 'UPDATE users SET password ="'.$n_pwd.'" where uid = '.$_SESSION['BB_USER']['uid'];


    if($conn->query($updQ)){
        ?>
            <script>
                alert('password changed');
                window.location = 'myaccount.php';
            </script>
        <?php
    }
}else {
 array_push($error,'new password does not match with');
}
  }else{
  array_push($error,'old password does not match password inserted');
 }
  
  }
?>

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h1 text-gray-800 mb-4">Change Password</h1>
                    
                  </div>
                  <?php
                  
                    foreach($error as $e){
                      echo '<div class="alert alert-danger">';
                      echo $e;
                      echo '</div>';
                    }
                  ?>
                  <form class="user" method="post">
                  <div class="form-group">
                      <input type="password" class="form-control form-control-user" required="required" name="o_pwd" aria-describedby="emailHelp" placeholder="Enter Old password...">
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" required="required" name="n_pwd" aria-describedby="emailHelp" placeholder="Enter New Password...">
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" required="required" name="cn_pwd" aria-describedby="emailHelp" placeholder="Repeat New Password...">
                    </div>

                    <button type="submit" name="update" class="btn btn-primary btn-user btn-block">
                      Update Password
                    </button>
                   
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <code  class="bg-secondary">

</code>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

