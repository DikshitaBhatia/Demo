<?php
$fname = ""; //first name
$lname = ""; //last name
$password = ""; //password
$password2 = "";
$em = "";
$em2 = "";
$date = "";
$error_array = array(); //holds error messages
if (isset($_POST['register_button'])) {
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ', '', $fname); // Remove Spaces
    $fname = ucfirst(strtolower($fname)); //lower case the whole name first and then capitalise the first letter
    $_SESSION['reg_fname'] = $fname;
    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ', '', $lname); // Remove Spaces
    $lname = ucfirst(strtolower($lname)); //lower case the whole name first and then capitalise the first letter
    $_SESSION['reg_lname'] = $lname;
    $em = strip_tags($_POST['reg_email']);
    $em = str_replace(' ', '', $em); // Remove Spaces
    $em = ucfirst(strtolower($em)); //lower case the whole name first and then capitalise the first letter
    $_SESSION['reg_email'] = $em;
    $em2 = strip_tags($_POST['reg_email2']);
    $em2 = str_replace(' ', '', $em2); // Remove Spaces
    $em2 = ucfirst(strtolower($em2)); //lower case the whole name first and then capitalise the first letter
    $_SESSION['reg_email2'] = $em2;

    $password = strip_tags($_POST['reg_password']);

    $password2 = strip_tags($_POST['reg_password2']);

    $date = date("y-m-d");


    if ($em == $em2) {
        if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);
             //check email already exists
      $e_check = $mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
               //count number of rows returned
        $num_rows = mysqli_num_rows($e_check);
          if($num_rows > 0) {
            array_push($error_array,"Email already in use<br>")  ;
          }
      
            }
             else {
              array_push($error_array,"Invalid Format") ;
          }
        }
       else {
        array_push($error_array,"Emails dont match");
    }
    if(strlen($fname)>25 || strlen($fname) < 2){
      array_push($error_array,"your first name must be between 2 to 25 characters<br>") ;
    }
    if(strlen($lname)>25 || strlen($lname) < 2){
        array_push($error_array,"your last name must be between 2 to 25 characters<br>");
      }
      if($password!= $password2) {
        array_push($error_array, "Your passwords do not match<br>");
      }
      else{
        if(preg_match('/[^A-Za-z0-9]/',$password)){
            array_push($error_array, "Your password can only contain english characters or numbers<br>");
        }
      }
      if(strlen($password > 30 || strlen($password)<5)){
        array_push($error_array," your password must be between 5 to 30 characters<br>");
      }
      if(empty($error_array)){
        $password = md5($password); //encrypt password before sending to database
        //generate username by caternating first name and last name
      }
        $username = strtolower($fname."_".$lname);
        $check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username '$username'");
        $i = 0;
        //if username exists add number to username
      while(mysqli_num_rows($check_username_query != 0)){
    $i++;
    $username = $username . "_" . $i;
    $check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username '$username'");
      }
      //profile picture assign
      $rand = rand(1,2); //random number between 1 and 2
      if($rand==1)
      $profile_pic ="assets/images/profile_pic/defaults/male.png";
      else if($rand==2)
      $profile_pic = "assets/images/profile_pic/defaults/female.jpeg";
    
      $query = mysqli_query($con, "INSERT INTO users VAlUES ('','$fname','lname','username'.'$email','$password','$date','$profile_pic','0','0','no','np')");
    
      array_push($error_array, "<span style='color:#9933ff> You'are all set! Go ahead and login</span><br>");
      $_SESSION['reg_fname'] ="";
      $_SESSION['reg_lname'] ="";
      $_SESSION['reg_email'] ="";
      $_SESSION['reg_email'] ="";
    }
      ?>