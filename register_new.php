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
</head>

<body>
    <form action="register_new.php" method="POST">
        <input type="email" name="log_email" placeholder="Email Address" value="<?php
        if(isset($_SESSION['log_email'])) {
          echo "$_SESSION['log_email']"?>" required
          >
        <br>
        <input type="password" name="log_password" placeholder="Password" >
        <br>
        <input type="submit" name="login_button" class="btn" value="Login">
  <?php
  if(in_array("Email or password is incorrect", $errpr_array))
  echo "Email / Password Incorrect";
  ?>
      </form>
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
        <input type="email" name="reg_email" placeholder="Email" value="value="<?php if(isset($_SESSION['reg_email'])){
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
        <input type="email" name="reg_email2" placeholder="Confirm Email" value="value="<?php if(isset($_SESSION['reg_email2'])){
            echo $_SESSION['reg_email2'] ;
          }
          ?> required>
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
    </form>

</body>

</html>