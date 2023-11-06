<?php
include('security.php');
session_start();


$connection = mysqli_connect("localhost","root","","adminpanel");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            //echo "Saved";
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: register.php');
        }
        else {
            $_SESSION['status'] = "Admin Profile NOT Added";
            header('Location: register.php');
        }
    
    }
    else
     {
        $_SESSION['status'] = "Password or Confirm Password Doesnot Match";
        header('Location: register.php');
    }
}


include('security.php');

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertypeupdate' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: register.php'); 
    }
}


include('security.php');

if(isset($_POST['delete_btn']))
{
     $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
     if($query_run)
        {
            $_SESSION['status'] = "Your Data is Deleted";
            $_SESSION['status_code'] = "success";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Your Dara is NOT DELETED";
            $_SESSION['status_code'] = "error";
            header('Location: register.php');
        }
    }






include('security.php');
if(isset($_POST['login_btn']))
{
   $email_login = $_POST['email']; 
    $password_login = $_POST['password']; 

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);
    $row=mysqli_fetch_array($query_run);
    $usertype=$row["usertype"];
 

    if($usertype == "admin")
    {
        
        $_SESSION['username'] = $email_login;
        header('Location: index.php');

    }
    else if ($usertype == "user")
    {
        $_SESSION['username'] = $email_login;
       header('Location: userpanel.php');
    }
    else {
        
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
    }

   
    
}


if(isset($_POST['save_face']))
{
    $name = $_POST['face_name'];
    $designation = $_POST['face_designation'];
    $images = $_FILES["face_image"]['name'];

    if(file_exists("upload/" . $_FILES["face_image"]["name"]))
    {
        $store = $_FILES["face_image"]["name"];
        $_SESSION['status']= "Image already exist. '.$store.'";
        header('Location: face.php');

    }
    else
    {
         $query = "INSERT INTO face (`name`,`designation`,`images`) VALUES ('$name','$designation', '$images')";
          $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        move_uploaded_file($_FILES["student_image"]["tmp_name"], "upload/".$_FILES["student_image"]["name"]);
        $_SESSION['success'] = "Face Added";
        header('Location: face.php');
    }
    else {
        $_SESSION['status'] = "Face NOT Added";
        header('Location: face.php');
    }
}


if(isset($_POST['face_update_btn']))
{
    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_designation = $_POST['edit_designation'];
    $edit_face_image = $_FILES["face_image"]['name'];
}

$query = "UPDATE face SET name='$edit_name', designation='$edit_designation', images='$edit_face_image' WHERE id='$edit_id' ";
$query_run = mysqli_query($connection, $query);

if($query_run)
{
    move_uploaded_file($_FILES["student_image"]["tmp_name"], "upload/".$_FILES["student_image"]["name"]);
        $_SESSION['success'] = "Face Updated";
        header('Location: face.php');
}


else
{
    $_SESSION['status'] = "Face NOT Updated";
    header('Location: face.php');
}


if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
}
}

?>