<?php
include "config/koneksi.php";
include "library/controller.php";

$query = mysqli_query($con, "SELECT max(id_buku) as id_buku FROM tbl_buku");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['id_buku'];

$urutan = (int) substr($kodeBarang, 3, 3);

$urutan++;
 
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Datatables -->
    <link rel="stylesheet" href="css/style.css">

    <title>Input Buku</title>
</head>
<body>
    <div class="container-fluid" id= "content">
        <div class="card">
            <div class="card-header">
                Form Buku
            </div>
            <div class="card-body">
                <form method="post" action="simpan.php">
                    <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fw-bold">Kode Buku</label>
                            <input type="text" name="nama" class="form-control" required="required" value="<?php echo $kodeBarang ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Judul Buku" value="<?php echo @$edit['judul']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">NO ISBN</label>
                        <input type="text" name="isbn" class="form-control" id="exampleFormControlInput1" placeholder="Masukan NO ISBN" value="<?php echo @$edit['noisbn']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Penulis</label>
                        <input type="text" name="penulis" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Penulis" value="<?php echo @$edit['penulis']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Penerbit" value="<?php echo @$edit['penerbit']?>" required>
                    </div>
            
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Tahun Terbit" value="<?php echo @$edit['tahun']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Stok</label>
                        <input type="text" name="stok" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Jumlah Stok" value="<?php echo @$edit['stok']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Harga Pokok</label>
                        <input type="text" name="harga_pokok" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Harga Pokok" value="<?php echo @$edit['harga_pokok']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Harga Jual</label>
                        <input type="text" name="harga_jual" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Harga Jual" value="<?php echo @$edit['harga_jual']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Diskon (%)</label>
                        <input type="number" name="diskon" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Diskon" value="<?php echo @$edit['diskon']?>" required>
                    </div>

                    <?php if(@$_GET['id']==""){ ?>
                        <button class="btn btn-primary" href="?menu=input_buku" type="submit" name="simpan" value="SIMPAN">Simpan</button>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div style="padding:10px;">
            <form class="d-flex">
                <label class="me-3">Pencarian</label>
                <input class="form-control me-3" type="search" placeholder="Judul Buku/Penulis" aria-label="Search">
                <button class="btn btn-primary me-2" type="submit">Cari</button>
                <button class="btn btn-outline-success" type="submit">Refresh</button>
            </form>
            <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
                <tr>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>NO ISBN</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Harga Pokok</th>
                    <th>Harga Jual</th>
                    <th>Diskon</th>
                    <th>edit</th>
                    <th>hapus</th>
                </tr>
                <?php
                    $barang = mysqli_query($con,"SELECT * FROM tbl_buku");
                    while($b = mysqli_fetch_array($barang)){
                ?>
                <tr>
                    <td><?php echo $b['id_buku']?></td>
                    <td><?php echo $b['judul']?></td>
                    <td><?php echo $b['noisbn']?></td>
                    <td><?php echo $b['penulis']?></td>
                    <td><?php echo $b['penerbit']?></td>
                    <td><?php echo $b['tahun']?></td>
                    <td><?php echo $b['stok']?></td>
                    <td><?php echo "Rp. ".number_format($b['harga_pokok'])." ,-"; ?></td>
                    <td><?php echo "Rp. ".number_format($b['harga_jual'])." ,-"; ?></td>
                    <td><?php echo $b['diskon']?>%</td>
                    <td><a href="?menu=input_buku&edit&id=<?php echo $r['id']?>">Edit</a></td>
                    <td><a href="?menu=input_buku&hapus&id=<?php echo $r['id_buku']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                </tr>
                <?php } ?>
                </table>
            </div>
        </div>
    </body>
</html>