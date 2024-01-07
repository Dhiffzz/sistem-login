<?php
require 'koneksi.php';
if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("location:login.php");
}
?>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="sty.css">
</head>
<body>
    <h1>Welcome <?php echo $row["nama_depan"];?></h1>
    <a href="logout.php" class="log">Logout</a>
</body>
</html>