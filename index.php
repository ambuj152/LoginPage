<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login-Form</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'><link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-form">
  <form method="post">
    <h1> Admin Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="text" placeholder="Username" autocomplete="nope" name="username">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" autocomplete="new-password" name="password">
      </div>
      <a href="#" class="link">Forgot Your Password?</a>
    </div>
    <div class="action">
      <button>Register</button>
      <button type="submit" name="validate">Sign in</button>
    </div>
  </form>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>

<?php

include('../connection.php');
if(isset($_POST['validate']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];

  $query="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password' ";
  $fire=mysqli_query($conn, $query);

  if (mysqli_num_rows($fire)>0)
  {
    $result=mysqli_fetch_assoc($fire);
    $_SESSION['id']=$result['id'];
    header('Location:../dashboard/index.php');
    // echo "<script>window.loaction.href='../dashboard/index.php'</script>";
  }
  else{
    echo 'password not matched';
  }

}
?>
</html>
