<?php
require 'includes/form_handlers/register_handler.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="register.css">
 
</head>

<body>
  <div class="wrapper">
    <div class="title">
      Registration Form
    </div>
    <div class="form">
      <form action="register.php" method="POST">
        <div class="inputfield">
          <label>First Name</label>
          <input type="text" name="reg_fname" class="input"  value="<?php if(isset($_SESSION['reg_fname'])){
            echo $_SESSION['reg_fname'] ;
          }
          ?>" required>
          
        </div>
        <?php if(in_array("your first name must be between 2 to 25 characters<br>", $error_array)) {
            echo "Your first name must be between 2 to 25 characters<br>";
}?>
        <div class="inputfield">
          <label>Last Name</label>
          <input type="text" name="reg_lname" class="input" value="<?php if(isset($_SESSION['reg_lname'])){
            echo $_SESSION['reg_lname'] ;
          }
          ?>" required>
        </div>
        <?php if(in_array("your last name must be between 2 to 25 characters<br>", $error_array)) {
            echo "your last name must be between 2 to 25 characters<br>";
}?>
        <div class="inputfield">
          <label>Password</label>
          <input type="password" name="reg_password" class="input"  required>
        </div>
        <div class="inputfield">
          <label>Confirm Password</label>
          <input type="password" name="reg_password2" class="input" required>
        </div>
        <?php if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) {
            echo "Your password can only contain english characters or numbers<br>";
}
else if(in_array(" your password must be between 5 to 30 characters<br>", $error_array)) {
  echo " your password must be between 5 to 30 characters<br>";
}?>
        <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
            <select>
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
        <?php if(in_array("Email already in use<br>", $error_array)) {
            echo "Email already in use<br>";}

else if(in_array("Emails don't Match<br>", $error_array)) {
            echo "Emails don't Match<br>";}

 else if(in_array("Invalid Format<br>", $error_array)) {
            echo "Invalid Format<br>";
}?>
        <div class="inputfield">
          <label>Email Address</label>
          <input type="text" class="input" name="reg_email" value="<?php if(isset($_SESSION['reg_email'])){
            echo $_SESSION['reg_email'] ;
          }
          ?>"required>
        </div>
        <div class="inputfield">
          <label>Confirm Email Address</label>
          <input type="text" class="input" name="reg_email2" required>
        </div>
        <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" name="reg_number" class="input" value="<?php if(isset($_SESSION['reg_number'])){
            echo $_SESSION['reg_number'] ;
          }
          ?>"required>
        </div>
        <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea"></textarea>
        </div>
        <div class="inputfield">
          <label>Postal Code</label>
          <input type="text" class="input" name="reg_postal">
        </div>
        <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
        </div>
        <div class="inputfield">
          <input type="submit" name="register_button" value="" class="btn">
          <br>
          <?php if(in_array("<span style='color:#9933ff> You'are all set! Go ahead and login</span><br>", $error_array)) {
            echo "<span style='color:#9933ff> You'are all set! Go ahead and login</span><br>";
}?>
        </div>
    </div>
    </form>
  </div>
</body>

</html>