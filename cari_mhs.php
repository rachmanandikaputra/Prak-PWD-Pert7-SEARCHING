<?php

// koneksi ke database
include "koneksi.php";

?>
<!-- Form pencarian dengan input text dan button cari -->
<h3>Form Pencarian Mahasiswa Dengan PHP</h3>
<form action="" method="get">
    <label for="cari">Cari : </label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>

<?php
// mengecek inputan dari inputan, lalu ditampilkan ke html data yang dicari
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian: ".$cari."</b>";
}

?>
<!-- table tampil data -->
<table border="1">
    <tr>
        <td>No</td>
        <td>Nama</td>
    </tr>
    <?php 
        // cek apakah ada inputan pada input cari
        if(isset($_GET['cari'])){
            // set variabel cari dengan isi inputan
            $cari = $_GET['cari'];
            // query pencarian mahasisa dengan clause where nama %cari% mencari seluruh kata yang mengandung kata dari inputan
            $sql = "SELECT * FROM mahasiswa WHERE nama like'%".$cari."%'";
            // eksekusi query 
            $tampil = mysqli_query($con, $sql);
        } else {
            // query untuk menampilkan seluruh data jika tidak ada data yang dicari/kosong
            $sql = "SELECT * FROM mahasiswa";
            // eksekusi query
            $tampil = mysqli_query($con, $sql);
        }
        $no = 1;
        // menampilkan data menggunakan looping dan melakukan fetch terlebih dahulu dalam bentuk array
        while($r = mysqli_fetch_array($tampil)){
            echo "<tr>";
                echo "<td>".$no++."</td>";
                echo "<td>".$r['nama']."</td>";
            echo "</tr>";
        }
    ?>
</table>