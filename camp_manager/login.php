<!DOCTYPE html>
<html lang="en">


<?php

include_once 'inc/head.php';

if (isset($_POST['login'])) {

  // if(!isset($_SESSION)){
  //   session_start();
  // }
  // var_dump($_SESSION);

  var_dump($_POST);
  extract($_POST);
  $password = $password;

  // include_once 'connect.php';

  $conn = new mysqli('localhost', 'root','','bloodbank1');
  $loginQ = 'SELECT * FROM `campmanager` inner join camp on camp = cpid where username = "'.$username.'" AND password = "'.$password.'"';

  if ($loginR=$conn->query($loginQ)) {
    $loginR= $loginR->fetch_assoc();

      session_start();
    if (is_array($loginR)) {
      $_SESSION['BB_MGR'] = $loginR;

      // var_dump($_SESSION['BB_MGR']);
      ?>
      <script>
      window.location = 'index.php';
      </script>
      <?php
      header('location: index.php');
    }else{
      echo 'Cannot login';
  }
    
  }
    }

?>
<body class="bg-gradient-primary">

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
                    <h1 class="h1 text-gray-800 mb-4">Blood Bank &bullet; <span class="h3 text-gray-900 mb-4">Camp Manager Login</span></h1>
                    
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" required="required" name="username" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" required="required" name="password"  placeholder="Password">
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                      Login
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

