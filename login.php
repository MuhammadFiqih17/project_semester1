<?php
session_start();
include 'oke.php';

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query= mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
    if(mysqli_num_rows($query)>0){
        $sql= mysqli_fetch_assoc($query);

        $_SESSION['username']=$sql['username'];
        $_SESSION['nama']=$sql['nama_pengguna'];
        $_SESSION['alamat']=$sql['alamat'];
        $_SESSION['id_user']=$sql['id_pengguna'];

        echo "<script>
        alert('Berhasil Login!')
        window.location = 'indek.php';
        </script>";
    }else{
        echo "<script>
        alert('Username atau Password tidak sesuai!')
        window.location = 'login.php';
        </script>";
    }
}
if(isset($_POST['daftar'])){
    $name = $_POST['nama'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $pw = $_POST['pw'];
    $pw2 = $_POST['pw2'];
    $queryy = mysqli_query($koneksi, "select * from user where username='$username'");
    $cek_login = mysqli_num_rows($queryy);

    if($cek_login > 0){
        echo "<script>
        alert('username telah digunakan');
        window.location = 'login.php';
        </script>";
    }else{
        if ($pw != $pw2){
            echo"<script>
            alert('konfirmasi password tidak sesuai');
            window.location = 'login.php';
            </script>";
        }else{
            mysqli_query($koneksi,"INSERT INTO user(nama_pengguna,username,alamat,password) VALUES('$name','$username','$alamat','$pw')"); 

            $_SESSION['usern']=$_POST['username'];
            $_SESSION['alamat']=$_POST['alamat'];
            $_SESSION['nama']=$_POST['nama'];

            echo "<script>
            alert('data berhasil dikirim');
            window.location = 'indek.php';
            </script>";
        }
    }
}
?>










<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FQ|Mechanic</title>
    <link rel="stylesheet" href="css/gg.css">
</head>
<body>
   <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
         <header>Login To FQ|Mechanic</header>
         <form action="login.php" method="post">
            <input type="text" placeholder="username" name="username">
            <input type="password" placeholder="Masukan password" name="password">
            <a href="#">Lupa password?</a>
            <input type="submit" value="login" name="login" class="submit">
         </form>
         <div class="signup">
            <span class="signup">Belum punya akun?
            <label for="check">Daftar</label>
            </span>
         </div>
    </div>
    <div class="registration form">
        <header>register form</header>
            <form action="login.php" method="post">
                <input type="text" placeholder="Nama lengkap" name="nama">
                <input type="text" placeholder="Username" name="username">
                <input type="text" placeholder="Alamat" name="alamat">
                <input type="password" placeholder="Masukan password" name="pw">
                <input type="password" placeholder="Masukan ulang password" name="pw2">
                <input type="submit" value="daftar" name="daftar" class="submit">
            </form>
            <div class="signup">
                <span class="signup">Sudah punya akun?
                    <label for="check">Login</label>
                </span>
            </div>
    </div>
</div>
</body>
</html>