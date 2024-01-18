<?php
include 'oke.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>






<?php
include 'oke.php';
if(isset($_GET['aksi'])){
    if($_GET['aksi']=="edit"){
        $result = mysqli_query($koneksi, "SELECT * FROM admin where id_pengguna='$_GET[id_pengguna]'");
        while ($sql = mysqli_fetch_array($result)){
            $nama_pengguna =$sql['nama_pengguna'];
            $username =$sql['username'];
            $password =$sql['password'];
            $foto =$sql['foto'];
        }
    }elseif($_GET['aksi']=="hapus"){
        $hapus = mysqli_query($koneksi,"DELETE FROM admin where id_pengguna='$_GET[id_pengguna]'");
        if($hapus){
            header("location: pengguna.php");
        }
    }
}
?>      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="login.php">Kembali ke home</a><br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <table widht="25%" border=0>
         <tr>
            <td>Nama pengguna</td>
            <td><input type="text" name="nama_pengguna" value=<?=@$nama_pengguna?>></td>
         </tr>
         <tr>
            <td>Username</td>
            <td><input type="text" name="username" value=<?=@$username?>></td>
         </tr>
         <tr>
            <td>Password</td>
            <td><input type="text" name="password" value=<?=@$password?>></td>
         </tr>
         <tr>
            <td>foto</td>
            <td><input type="file" name="foto" value=<?=@$foto?>></td>
         </tr>
         <tr>
            <td><input type="submit" name="submit" value="tambah"></td>
         </tr>
        </table>
    </form>
<table border="3">
    <thead>
        <th>nomor</th>
        <th>nama pengguna</th>
        <th>username</th>
        <th>password</th>
        <th>foto</th>
        <th>aksi</th>
    </thead>
    <tbody>
    <?php
            include 'oke.php';
            $no=1;
            $query= mysqli_query($koneksi,"SELECT * FROM admin");
            while($data=mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$no; $no++."</td>";
                echo "<td>".$data['nama_pengguna']."</td>";
                echo "<td>".$data['username']."</td>";
                echo "<td>".$data['password']."</td>";
                echo "<td><img src='img/".$data['foto']."'></td>";
            ?>
            <td> <a href="pengguna.php?aksi=edit&id_pengguna=<?=$data['id_pengguna']?>">edit</a>
            <a href="pengguna.php?aksi=hapus&id_pengguna=<?=$data['id_pengguna']?>">hapus</a></td>
        </tr>
    </tbody>
    <?php } ?>
</table>
<?php
include 'oke.php';
if(isset($_POST['submit'])){
    if($_GET['aksi']=="edit"){
            $id_pengguna= $_GET['id_pengguna'];
            $nama_pengguna =$_POST['nama_pengguna'];
            $username =$_POST['username'];
            $password =$_POST['password'];
            $foto =$_FILES['foto']['name'];
            $file_tmp =$_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp, 'img/'.$foto);
            $edit = mysqli_query($koneksi, "UPDATE user admin nama_pengguna='$nama_pengguna',username='$username',password='$password' ,foto='$foto' where id_pengguna='$id_pengguna'");
        if ($edit > 0){
            header("location: pengguna.php");
        }
    }else{
        $nama_pengguna =$_POST['nama_pengguna'];
        $username =$_POST['username'];
        $password =$_POST['password']; 
        $foto =$_FILES['foto']['name'];
        $file_tmp =$_FILES['foto']['tmp_name'];
        move_uploaded_file($file_tmp, 'img/'.$foto);
        $result = mysqli_query($koneksi, "INSERT INTO admin(id_pengguna,nama_pengguna,username,password,foto) VALUES('$id_pengguna','$nama_pengguna','$username','$password','$foto')");  
        if($result > 0){
            header("location: pengguna.php");
        }
    }
}
?>
</body>
</html>