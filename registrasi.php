<?php
require 'koneksi.php';
if(!empty($_SESSION['id'])){
    header("location:index.php");
}
if(isset($_POST["submit"])){
    $nama_depan = $_POST["nama_depan"];
    $nama_belakang = $_POST["nama_belakang"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE email ='$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('email telah digunakan');</script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_users VALUES('', '$nama_depan', '$nama_belakang', '$gender', '$email', '$password')";
            mysqli_query($koneksi, $query);
            echo
            "<script> alert('registrasi berhasil');window.location = 'login.php';</script>";
        }
        else{
            echo
        "<script> alert('password tidak sama');</script>";
        }
    }
}
?>

<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="sty.css">
</head>
<body>
    <form action="" method="post" autocomplete="off">
        <h2>Registrasi</h2>

        <label>Nama Depan</label>
        <input type="text" name="nama_depan" placeholder="Nama Depan" autofocus>

        <label>Nama Belakang</label>
        <input type="text" name="nama_belakang" placeholder="Nama Belakang">

        <label>Gender</label>
        <select name="gender">
            <option value="Laki-Laki">Laki Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label>Email</label>
        <input type="email" name="email" placeholder="Email">

        <label>Password</label>
        <input type="password" name="password" placeholder="Password">

        <label>Confirm Password</label>
        <input type="password" name="confirmpassword" placeholder="Confirm Password">

        <button type="submit" name="submit">Register</button>
        <a href="login.php" class="ca">Already have an account</a>
    </form>
</body>
</html>