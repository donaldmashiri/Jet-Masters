<?php include('includes/header.php') ?>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="#" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i>Jet</p>
       
        <?php 

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "select * from admin where admin_name = '$username' and admin_pass = '$password'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
      
        header("Location: home.php" );
                        
  } else {
      echo "<p style='color:red;'>Invalid username and password</p>";
  }


}

?>


        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="username" class="form-control" placeholder="Username" autofocus required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
       
        <button name="login" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        <br>
        
      </div>
    </form>
   
  </div>


</body>

</html>
