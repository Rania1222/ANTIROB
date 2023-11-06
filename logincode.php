<?php
include('security.php');

$connection = mysqli_connect("localhost","root","","adminpanel");

if(isset($_POST['login_btn']))
[
    echo $email_login = $_POST['emaill'];
    echo $password_login = $_POST['passwordd'];

    echo "Maha anjum".$query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($quert_run);

    if(usertypes ['usertype']== "admin")
    {
        $_SESSION['username'] = $email_login;
       // header('Location: index.php');
    }
    else if ($usertypes ['usertype'] == "user")
    {
        $_SESSION['username'] = $email_login;
        header('Location: userpanel.php');
    }
    else
    {
        $_SESSION['status'] = "Email/ Password is invalid";
        header('Location: login.php');
    }
    ]

    ?>