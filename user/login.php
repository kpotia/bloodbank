<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blood Bank - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body >
<?php include_once 'inc/nav.php';?> 

<?php

if (isset($_POST['login'])) {

  var_dump($_POST);
  extract($_POST);
  // $password = md5($password);

  // include_once 'connect.php';

  $conn = new mysqli('localhost', 'root','','bloodbank1');
  $loginQ = 'SELECT * FROM users where email = "'.$email.'" AND password = "'.$password.'"';

  if ($loginR=$conn->query($loginQ)) {
    $loginR= $loginR->fetch_assoc();

      // session_start();
    if (is_array($loginR)) {
      session_start();
      $_SESSION['BB_USER'] = $loginR;

      var_dump($_SESSION['BB_USER']);

      header('location: myaccount.php');
    }else{?>
<script>
alert('login error');
</script>      
    <?php  
  }    
  } }
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
                    <h1 class="h1 text-gray-800 mb-4">Blood Bank Login</h1>
                    
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" required="required" name="email" aria-describedby="emailHelp" placeholder="Enter Email...">
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

