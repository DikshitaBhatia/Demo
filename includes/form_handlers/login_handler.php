<?php
if(isset($_POST['login_button'])){
    $email = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL);//sanitize email
    $_SESSION['log_emqail'] = $email;
    $password = md5($_POST['log_password']);

    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);

    if($check_login_query == 1){
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];

        $_SEESSION['username'] = $username;
    header("Location: index.php");
    }
}