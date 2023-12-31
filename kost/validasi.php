<?php
include "includes/header.php";


$no_tagihan = $_GET['no_tagihan'];

$query2 = "SELECT * FROM kamar JOIN booking ON kamar.id_kamar=booking.id_kamar JOIN tagihan ON booking.id_booking=tagihan.no_booking JOIN kost ON kost.id_kost=kamar.id_kost WHERE tagihan.no_tagihan='$no_tagihan'";
$data2 = mysqli_query($koneksi, $query2);
$n = mysqli_fetch_array($data2);
?>

<div class="container">
    </iframe>
    <div class="" class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <h4>
                        <?php echo $n['nama_kost'] ?>
                    </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail rounded" src="../img/foto_kost/kamar/<?php echo $n['foto_kamar'] ?>" width="100%" alt="Foto kamar kost">
                </div>
                <div class="col">

                    <div class="row">
                        <div class="col">
                            No Tagihan : <?php echo $no_tagihan  ?>
                        </div>
                    </div>

                    <hr>
                    <h6></h6>


                    <div class="row">
                        <div class="col">
                            No. Rekening :
                            <?php echo $n['no_rekening'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Pemilik Rekening :
                            <?php
                            $id_kost = $n['id_kost'];
                            $f = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kost WHERE id_kost='$id_kost'"));
                            echo $f['nama_pemilik'];
                            ?>
                        </div>
                    </div>


                    <!-- Total Tagihan  -->
                    <div class="row">
                        <div class="col">Total Tagihan :
                            <?php
                            echo "Rp. " . number_format($n['total_tagihan'], 0, ',', '.')
                            ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    Upload Bukti Pembayaran :
                    <input class="form-control" type="file" name="gambar" id="gambar">
                </div>
            </div>
            <br>

            <div class="row">
                <button name="submit" type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-paper-plane"></i> <!-- Mengganti ikon menjadi ikon kirim -->
                    </span>
                    <span class="text">Kirim</span>
                </button> <!-- Mengganti tag penutup </a> menjadi </button> -->
            </div>



            <?php
           if (isset($_POST['submit'])) {
            // Check if the "Upload Bukti Pembayaran" field is not empty
                if (!empty($_FILES['gambar']['name'])) {
                    $query = "UPDATE tagihan SET stats=2 WHERE no_tagihan='$no_tagihan'";
                    $data = mysqli_query($koneksi, $query);
                    
                    $gambar = $_FILES['gambar']['name'];
                    $simpan_gambar = $_FILES['gambar']['tmp_name'];
                    move_uploaded_file($simpan_gambar, "../img/bukti_bayar/" . $gambar);
                    
                    $query = "UPDATE tagihan SET bukti_bayar='$gambar' WHERE no_tagihan='$no_tagihan'";
                    $data = mysqli_query($koneksi, $query);
                } else {
                    // Handle the case when the "Upload Bukti Pembayaran" field is empty
                    echo '<div class="alert alert-danger" role="alert">Silahkan Upload Bukti Pembayaran Dahulu!</div>';
                }
            }
            ?>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
</div>


<?php
include "includes/footer.php";
?>