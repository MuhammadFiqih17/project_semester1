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
        $result = mysqli_query($koneksi, "SELECT * FROM barang where id_barang='$_GET[id_barang]'");
        while ($sql = mysqli_fetch_array($result)){
            $id_barang =$sql['id_barang'];
            $nama_barang =$sql['nama_barang'];
            $harga_barang =$sql['harga_barang'];
            $foto =$sql['foto'];
        }
    }elseif($_GET['aksi']=="hapus"){
        $hapus = mysqli_query($koneksi,"DELETE FROM barang where id_barang='$_GET[id_barang]'");
        if($hapus){
            header("location: barang.php");
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
            <td>Nama barang</td>
            <td><input type="text" name="nama_barang" value=<?=@$nama_barang?>></td>
         </tr>
         <tr>
            <td>Harga Barang</td>
            <td><input type="text" name="harga_barang" value=<?=@$harga_barang?>></td>
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
        <th>nama barang</th>
        <th>harga barang</th>
        <th>foto</th>
        <th>aksi</th>
    </thead>
    <tbody>
    <?php
            include 'oke.php';
            $no=1;
            $query= mysqli_query($koneksi,"SELECT * FROM barang");
            while($data=mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$no; $no++."</td>";
                echo "<td>".$data['nama_barang']."</td>";
                echo "<td>".$data['harga_barang']."</td>";
                echo "<td><img src='img/".$data['foto']."'></td>";
            ?>
            <td> <a href="barang.php?aksi=edit&id_barang=<?=$data['id_barang']?>">edit</a>
            <a href="barang.php?aksi=hapus&id_barang=<?=$data['id_barang']?>">hapus</a></td>
        </tr>
    </tbody>
    <?php } ?>
</table>
<?php
include 'oke.php';
if(isset($_POST['submit'])){
    if($_GET['aksi']=="edit"){
            $id_barang= $_GET['id_barang'];
            $nama_barang =$_POST['nama_barang'];
            $harga_barang =$_POST['harga_barang'];
            $foto =$_FILES['foto']['name'];
            $file_tmp =$_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp, 'img/'.$foto);
            $edit = mysqli_query($koneksi, "UPDATE barang set nama_barang='$nama_barang',harga_barang='$harga_barang',foto='$foto' where id_barang='$id_barang'");
        if ($edit > 0){
            header("location: barang.php");
        }
    }else{
            $nama_barang =$_POST['nama_barang'];
            $harga_barang =$_POST['harga_barang'];
            $foto =$_FILES['foto']['name'];
            $file_tmp =$_FILES['foto']['tmp_name'];
        move_uploaded_file($file_tmp, 'img/'.$foto);
        $result = mysqli_query($koneksi, "INSERT INTO barang(nama_barang,harga_barang,foto) VALUES('$nama_barang','$harga_barang','$foto')");  
        if($result > 0){
            header("Location: barang.php");
        }
    }
}
?>
</body>
</html>