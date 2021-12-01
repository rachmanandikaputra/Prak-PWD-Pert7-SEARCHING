<?php

include "koneksi.php";

?>
<!-- form pencarian -->
<h3>Form Pencarian Data KHS Dengan PHP</h3>
<form action="" method="get">
    <label for="cari">Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>

<?php
// mengecek inputan dari inputan, lalu ditampilkan ke html data yang dicari
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian: " . $cari . "</b>";
}
?>
<!-- table tampil data -->
<table border="1">
    <tr>
        <td>No</td>
        <td>NIM</td>
        <td>Kode MK</td>
        <td>Nilai</td>
    </tr>
    <?php

    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        // query dengan clause where dimana inputan cari harus sama dengan data yang ada didatabase, jika berbeda 1 karakter tidak akan muncul berbeda dengan like, dia akan muncul jika ada yang mirip dan like ada beberapa kunci seperti %s 's_' dst
        $sql = "SELECT * FROM khs WHERE nim='".$cari."'";
        // eksekusi query
        $tampil = mysqli_query($con, $sql);
    } else {
        // query ambil semua data khs
        $sql = "SELECT * FROM khs";
        // eksekusi query
        $tampil = mysqli_query($con, $sql);
    }
    $no = 1;
    // looping data untuk ditampilkan ke table
    while($r = mysqli_fetch_array($tampil)){
        echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$r['nim']."</td>";
            echo "<td>".$r['kodeMK']."</td>";
            echo "<td>".$r['nilai']."</td>";
        echo "</tr>";
    }

    ?>
</table>