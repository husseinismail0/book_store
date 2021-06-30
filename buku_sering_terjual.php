<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "tbl_tmp_penjualan";
@$field = array('judul'=>$_POST['judul_buku'], 'noisbn'=>$_POST['isbn'], 'penulis'=>$_POST['penulis'], 'penerbit'=>$_POST['penerbit'], 'tahun'=>$_POST['tahun_terbit'], 'stok'=>$_POST['stok'], 'harga_pokok'=>$_POST['harga_pokok'], 'harga_jual'=>$_POST['harga_jual'], 'diskon'=>$_POST['diskon']);
$redirect = "?menu=input_buku";
@$where = "id_buku = $_GET[id]";

if (isset($_POST['simpan'])) {

    $go->simpan($con, $tabel, $field, $redirect);
}
if (isset($_GET['hapus'])) {
    $go->hapus($con, $tabel, $where, $redirect);
}
if (isset($_GET['edit'])) {
    $edit = $go->edit($con, $tabel, $where);
}
if (isset($_POST['ubah'])) {
    $go->ubah($con, $tabel, $field, $where, $redirect);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Yang Sering Terjual</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    DATA BUKU BANYAK TERJUAL
	    </div>
	    <div class="card-body">
            <div style="padding:10px;">
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="submit">Export Excel</button>
                </form>
                <div class="table-responsive">
                    <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>NO ISBN</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Harga Jual</th>
                            <th>Total Jumlah Beli</th>
                            <th>Total Transaksi</th>
                        </tr>
                        <?php
                            $no = 1;
                            $sql = "SELECT * FROM tbl_tmp_penjualan
                            INNER JOIN tbl_buku ON tbl_tmp_penjualan.id_buku = tbl_buku.judul";
                            $jalan = mysqli_query($con, $sql);
                            while($r= mysqli_fetch_array($jalan)){
                        ?>
                        <tr>
                            <td><?php echo $no ?></td>
                             <td><?php echo $r['total_harga']?></td>
                             <td><?php echo $r['noisbn']?></td>
                             <td><?php echo $r['penulis']?></td>
                             <td><?php echo $r['penerbit']?></td>
                             <td><?php echo $r['harga_pokok']?></td>
                             <!-- <td><?php echo $r['harga_jual']?></td> -->
                             <!-- <td><?php echo $r['diskon']?></td> -->
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>