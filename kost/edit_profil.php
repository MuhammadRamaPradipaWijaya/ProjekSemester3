<?php
include 'includes/header.php';

$username = $_SESSION['username'];
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$d = mysqli_fetch_array($data);
?>

<style>
  .container {
    width: 70%;
    padding: 5%;
  }
</style>

<div class="container ">
  <h4 class="text-center">Ubah Data</h4>
  <hr>
  <div class="row">
    <div class="container-fluid">
      <!-- form  -->
      <form action="php/edit-profil_proses.php" method="post" class="" enctype="multipart/form-data">
        <div class="form-group row">
          <div class="col"><label class="form-text" for="username">Username :</label></div>
          <div class="col-sm-8"><input class="form-control" type="text" name="username" id="username" value="<?php echo $username ?>" readonly></div>
        </div>
        <div class="form-group row">
          <div class="col"><label for="nama_lengkap">Password :</label></div>
          <div class="col-sm-8"><input type="text" name="password" id="password" class="form-control" value="<?php echo $d['password']; ?>"></div>
        </div>
        <div class="form-group row">
          <div class="col"><label for="nama_lengkap">Nama Lengkap :</label></div>
          <div class="col-sm-8"><input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?php echo $d['nama_lengkap']; ?>"></div>
        </div>
        <div class="form-group row">
          <div class="col"><label for="email">Email :</label></div>
          <div class="col-sm-8"><input type="email" name="email" id="email" class="form-control" value="<?php echo $d['email']; ?>"></div>
        </div>
        <div class="form-group row">
          <div class="col"><label for="no_hp">Nomer Handphone/Telepon:</label></div>
          <div class="col-sm-8"><input type="number" name="no_hp" id="no_hp" class="form-control" value="<?php echo $d['no_hp']; ?>"></div>
        </div>
        <!-- upload file -->
        <div class="row form-group">
          <div class="col"><label for="foto_profil">Ubah Foto Profil :</label></div>
          <div class="col-sm-8"><input type="file" name="foto_profil" id="foto_profil" value="<?php echo $d['foto_profil']; ?>"></div>
        </div>
        <div class="form-group row">
          <div class="col">
            <button type="submit" value="submit" class="btn-primary" name="submit">Ubah Data</button>
          </div>
        </div>
      </form>
      <!-- end form  -->

    </div>
  </div>
</div>


<?php
include 'includes/footer.php';
?>