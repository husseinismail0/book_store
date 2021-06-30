<?php 
// https://www.malasngoding.com
// menghubungkan koneksi database
include "config/koneksi.php";

// menangkap data dari form
$nama = $_POST['nama'];
$judul = $_POST['judul'];
$isbn = $_POST['isbn'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$stok = $_POST['stok'];
$harga_pokok = $_POST['harga_pokok'];
$harga_jual = $_POST['harga_jual'];
$ppn = $_POST['ppn'];
$diskon = $_POST['diskon'];

// menginput data ke table barang

mysqli_query($con,"INSERT INTO tbl_buku VALUES ('$nama', '$judul', '$isbn', '$penulis', '$penerbit', '$tahun', '$stok', '$harga_pokok', '$harga_jual', '$ppn', '$diskon')")or die(mysqli_error($con));

// mengalihkan halaman kembali ke index.php
header("location:input_buku.php");
?>