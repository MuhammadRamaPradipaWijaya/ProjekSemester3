<?php
include "../../koneksi.php";
session_start();


if (isset($_POST['ubah'])) {

    // ambil id kost 
    $id_kost = $_GET['id_kost'];

    $query2 = "SELECT * FROM kost WHERE id_kost='$id_kost'";
    $data_2 = mysqli_query($koneksi, $query2);
    $n = mysqli_fetch_array($data_2);

    // tutup 
    $nama_kost = $_POST['nama_kost'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $deskripsi = $_POST['deskripsi'];
    $kontak = $_POST['kontak'];

    // info pembayaran
    $tanggal_tagih = $_POST['tanggal_tagih'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $nama_bank = $_POST['nama_bank'];
    $no_rekening = $_POST['no_rekening'];

    //fasilitas
    $fasilitas_kost = $_POST['fasilitas'];
    if (is_array($fasilitas_kost)) {
        $fasilitas = implode(', ', $fasilitas_kost);
    } else {
        // Handle the case where $fasilitas_kost is not an array (it might be a string)
        $fasilitas = $fasilitas_kost;
    }


    // foto bangunan
    $foto_bangunan_utama = $_FILES['foto_bangunan_utama']['name'];
    $foto_kamar = $_FILES['foto_kamar']['name'];
    $foto_kamar_mandi = $_FILES['foto_kamar_mandi']['name'];
    $foto_interior = $_FILES['foto_interior']['name'];
    $foto_1 = $_FILES['foto_bangunan_utama']['tmp_name'];
    $foto_2 = $_FILES['foto_kamar']['tmp_name'];
    $foto_3 = $_FILES['foto_kamar_mandi']['tmp_name'];
    $foto_4 = $_FILES['foto_interior']['tmp_name'];

    // ... (previous code)

    // move uploaded untuk pindahkan data
    if ($foto_bangunan_utama != "") {
        move_uploaded_file($foto_1, "../../img/foto_kost/bangunan_utama/" . $foto_bangunan_utama);
    } else {
        $foto_bangunan_utama = $n['foto_bangunan_utama'];
    }

    if ($foto_kamar != "") {
        move_uploaded_file($foto_2, "../../img/foto_kost/kamar/" . $foto_kamar);
    } else {
        $foto_kamar = $n['foto_kamar'];
    }

    if ($foto_kamar_mandi != "") {
        move_uploaded_file($foto_3, "../../img/foto_kost/kamar_mandi/" . $foto_kamar_mandi);
    } else {
        $foto_kamar_mandi = $n['foto_kamar_mandi'];
    }

    if ($foto_interior != "") {
        move_uploaded_file($foto_4, "../../img/foto_kost/interior/" . $foto_interior);
    } else {
        $foto_interior = $n['foto_interior'];
    }

    // ... (continue with the rest of your code)


    // detail kost 
    $jenis_kost = $_POST['jenis_kost'];
    $tipe_kost = $_POST['tipe_kost'];
    $harga_sewa = $_POST['harga_sewa'];

    // id pemilik
    $username = $_SESSION['username'];
    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $d = mysqli_fetch_array($data);
    $pemilik = $d['id'];
    // end inisialisasi

    // query insert jumlah
    $query = "UPDATE kost SET nama_kost='$nama_kost',tipe_kost='$tipe_kost',jenis_kost='$jenis_kost',tanggal_tagih='$tanggal_tagih',nama_pemilik='$nama_pemilik',nama_bank='$nama_bank',no_rekening='$no_rekening',foto_bangunan_utama='$foto_bangunan_utama',foto_kamar='$foto_kamar',foto_kamar_mandi='$foto_kamar_mandi',foto_interior='$foto_interior',provinsi='$provinsi',kota='$kota',kecamatan='$kecamatan',kelurahan='$kelurahan',alamat='$alamat',harga_sewa='$harga_sewa',kontak='$kontak',deskripsi='$deskripsi',fasilitas_kost='$fasilitas' WHERE id_kost=$id_kost";
    $tambah = mysqli_query($koneksi, $query);

    $query_ambil = mysqli_query($koneksi, "SELECT id_kost FROM kost WHERE nama_kost='$nama_kost'");
    $g = mysqli_fetch_array($query_ambil);
    $id_kost = $g['id_kost'];

    if ($tambah) {
        header("location:../kost_manage.php?id_kost=$id_kost");
    } else {
        header("location:../index.php");
        echo "<script>alert('gagal')</script>";

        }
    }
?>