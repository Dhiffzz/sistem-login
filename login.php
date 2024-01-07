<?php
require 'koneksi.php';
if(!empty($_SESSION['id'])){
    header("location:index.php");
}
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($koneksi, "SELECT * FROM tb_users where email ='$email' and password = '$password'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location:index.php");
        }
        else{
            echo
            "<script> alert('email belum terdaftar');</script>";
        }
    }
    else{
        echo
        "<script> alert('password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="sty.css">
</head>
<body>
    <form action="" method="post">
        <h2>LOGIN</h2>

        <label>Email</label>
        <input type="email" name="email" placeholder="Email" autofocus>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"></br>

        <button type="submit" name="login">Login</button>
        <a href="registrasi.php" class="ca">Create an account</a>
    </form>
</body>
</html>