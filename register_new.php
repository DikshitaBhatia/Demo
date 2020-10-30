<?php
 require 'config/config.php';
 require 'includes/form_handlers/register_handler.php';
 require 'includes/form_handlers/login_handler.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Registering</title>
    <link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/register_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="assets/js.register.js"></script>
</head>

<body>
  <?php
  if(isset($_POST['register_button'])){
    echo '
    <script>
    $(document).ready(function(){
      $("#first").hide();
      $("#second").show();
    
  });
  </script>';
}
  ?>
<div class="wrapper">
<div class="login_box">
<div class="login_header">
<h1>Socionet</h1>
Login or Sign Up below
</div>
<div id="first">
<form action="register_new.php" method="POST">
        <input type="email" name="log_email" placeholder="Email Address" value="<?php if(isset($_SESSION['log_email'])){
            echo $_SESSION['log_email'] ;
          }
          ?>" required
          >
        <br>
        <input type="password" name="log_password" placeholder="Password" >
        <br>
        <a href="C:\xampp\htdocs\demo\index.php">
        <input type="submit" name="login_button" class="btn" value="Login">
        </a>
  <?php
  if(in_array("Email or password is incorrect", $error_array))
  echo "Email / Password Incorrect";
  ?>
  <br>
  <a href="#" class="signup" id="signup">Need an Account? Register Here! </a>
      </form>
</div>
    <div id="second">
    <form action="register_new.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" value="<?php if(isset($_SESSION['reg_fname'])){
            echo $_SESSION['reg_fname'] ;
          }
          ?>" required>
        <br>
        <?php if(in_array("your first name must be between 2 to 25 characters<br>", $error_array)) {
            echo "Your first name must be between 2 to 25 characters<br>";
}?>
        <input type="text" name="reg_lname" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname'])){
            echo $_SESSION['reg_lname'] ;
          }
          ?>" required>
        <br>
        <?php if(in_array("your last name must be between 2 to 25 characters<br>", $error_array)) {
            echo "your last name must be between 2 to 25 characters<br>";
}?>
        <input type="email" name="reg_email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])){
            echo $_SESSION['reg_email'] ;
          }
          ?>" required>
        <br>
        <?php if(in_array("Email already in use<br>", $error_array)) {
            echo "Email already in use<br>";}

else if(in_array("Emails don't Match<br>", $error_array)) {
            echo "Emails don't Match<br>";}

 else if(in_array("Invalid Format<br>", $error_array)) {
            echo "Invalid Format<br>";
}?>
        <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php if(isset($_SESSION['reg_email2'])){
            echo $_SESSION['reg_email2'] ;
          }
          ?>" required>
        <br>
        <input type="password" name="reg_password" placeholder="Password" required>

        <br>
        <?php if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) {
            echo "Your password can only contain english characters or numbers<br>";
}
else if(in_array(" your password must be between 5 to 30 characters<br>", $error_array)) {
  echo " your password must be between 5 to 30 characters<br>";
}?>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <input type="submit" name="register_button" class="btn" value="Register">
        <br>
    <a href="#" class="signup" id="signin">Already have an account? Login Here!</a>
    </form>
</div>
</div>
</div>

</body>
</html>