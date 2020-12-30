 <nav class="navbar navbar-expand-md navbar-dark bg-primary mb-5">
        <div class="container">

        
      <a class="navbar-brand" href="index.php">BloobBank</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="camps.php">Camps</a>
          </li>
           <li class="nav-item">
            <a class="nav-link " href="request.php">Requests</a>
          </li>

        </ul>

        <div class="row text-white">
        <?php 
if(!isset($_SESSION['BB_USER'])):
?>
        <a class="nav-link btn  btn-primary " href="login.php">Login</a>
         
         <a class="nav-link btn btn-primary" href="register.php">Register</a>

<?php else:?>


<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Hi,<?php echo $_SESSION['BB_USER']['firstname'];?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="myaccount.php">My Profile</a>
    <a class="dropdown-item" href="update_p.php">Update Profile</a>
    <a class="dropdown-item" href="change_pwd.php">Change Password</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
<?php endif;?>
        </div> 
    </div></div>
    
</nav>