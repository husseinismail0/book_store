<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tanggal = date('Y-m-d');
$tabel = "tbl_pasok";
@$field = array('id_distributor'=>$_POST[''],'judul'=>$_POST['judul_buku'], 'noisbn'=>$_POST['isbn'], 'penulis'=>$_POST['penulis'], 'penerbit'=>$_POST['penerbit'], 'tahun'=>$_POST['tahun_terbit'], 'stok'=>$_POST['stok'], 'harga_pokok'=>$_POST['harga_pokok'], 'harga_jual'=>$_POST['harga_jual'], 'diskon'=>$_POST['diskon']);
$redirect = "?menu=input_buku";
$redirect = "?menu=input_distri";
@$where = "id_buku = $_GET[id]";
@$where = "id_distributor = $_GET[id]";

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
    <title>Pasok Buku</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    LAPORAN PASOK BUKU
	    </div>
    </div>
    <div style="padding:10px;">
        <form class="d-flex">
            <label class="me-3">Periode</label>
            <input class="form-control me-3" type="date" name="tglawal" aria-label="Search">
            <label class="me-3">Sd</label>
            <input class="form-control me-3" type="date" name="tglakhir" aria-label="Search">
            <button class="btn btn-primary me-2" type="submit">Tampilkan</button>
            <button class="btn btn-primary me-2" type="submit">Refresh</button>
            <button class="btn btn-outline-success" type="submit">cetak</button>
        </form>
        <div class="table-responsive">
            <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
                <tr>
                    <th>No</th>
                    <th>Nama Distributor</th>
                    <th>Judul Buku</th>
                    <th>NO ISBN</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Jumlah Pasok</th>
                    <th>Tanggal</th>
                </tr>
                <?php
                $no = 1;
                    $sql = "SELECT * FROM tbl_pasok
                    INNER JOIN tbl_distributor ON tbl_pasok.id_distributor = tbl_distributor.id_distributor";
                    $jalan = mysqli_query($con, $sql);
                    while($r= mysqli_fetch_array($jalan)){
                ?>
                <tr>
                    <td><?php echo $no++ ?>.</td>
                    <td><?php echo $r['nama_distributor']?></td>
                    <td><?php echo $r['judul']?></td>
                    <td><?php echo $r['noisbn']?></td>
                    <td><?php echo $r['penulis']?></td>
                    <td><?php echo $r['penerbit']?></td>
                    <td><?php echo $r['harga_pokok']?></td>
                    <td><?php echo $r['stok']?></td>
                    <td><?php echo $r['jumlah']?></td>
                    <td><?php echo $r['tanggal']?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>