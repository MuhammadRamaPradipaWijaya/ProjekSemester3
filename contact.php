<?php

include("koneksi.php");

if (mysqli_connect_error()) {

    echo "Koneksi gagal: " . mysqli_connect_error();

}

if (isset($_GET['success']) && $_GET['success'] == 1) {

  echo '<script>alert("Berhasil!");</script>';

}



?>

<!doctype html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="author" content="Untree.co">

  

  <!-- Website Icon -->

  <link rel="icon" type="image/png" href="img/home.png">



  <meta name="description" content="" />

  <meta name="keywords" content="bootstrap, bootstrap4" />



  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/daterangepicker.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">



  <!-- Icon  -->

  <script src="https://unpkg.com/feather-icons"></script>



  <title>Info kost.</title>



  <style>





@media (min-width: 0) {

    .g-mr-15 {

        margin-right: 1.07143rem !important;

    }

}

@media (min-width: 0){

    .g-mt-3 {

        margin-top: 0.21429rem !important;

    }

}



.g-height-50 {

    height: 50px;

}



.g-width-50 {

    width: 50px !important;

}



@media (min-width: 0){

    .g-pa-30 {

        padding: 2.14286rem !important;

    }

}



.g-bg-secondary {

    background-color: #fafafa !important;

}



.u-shadow-v18 {

    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);

}



.g-color-gray-dark-v4 {

    color: #777 !important;

}



.g-font-size-12 {

    font-size: 0.85714rem !important;

}



.media-comment {

    margin-top:20px

}



    .row {

      display: flex;

      justify-content: center;

      align-items: center;

      flex-wrap: wrap;

    }



    .row a {

      margin: 5px;



      .search-input {

        width: 300px;

        /* Adjust the width as needed */

      }



      .inner.dark {

      background-color: #007bff; /* Warna biru yang diinginkan */

    }



    }

  </style>

</head>



<body>





  <div class="site-mobile-menu site-navbar-target">

    <div class="site-mobile-menu-header">

      <div class="site-mobile-menu-close">

        <span class="icofont-close js-menu-toggle"></span>

      </div>

    </div>

    <div class="site-mobile-menu-body"></div>

  </div>



  <nav class="site-nav">

    <div class="container">

      <div class="site-navigation">

        <a href="contact.php" class="logo m-0">Info Kost <span class="text-primary">.</span></a>



        <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">

          <li><a href="index.php">Home</a></li>

          <li><a href="daftarkos.php">Daftar Kost</a></li>

          <li class="active"><a href="contact.php">Contact</a></li>

          <li><a href="login.php">Login</a></li>

        </ul>



        <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">

          <span></span>

        </a>



      </div>

    </div>

  </nav>





  <div class="hero hero-inner">

    <div class="container">

      <div class="row align-items-center">

        <div class="col-lg-6 mx-auto text-center">

          <div class="intro-wrap">

            <h1 class="mb-0">kontak kami</h1>

            <p class="text-white">Temukan Cara Terbaik untuk Menghubungi Tim Kami yang Ramah dan Profesional. 

                Kami Siap Mendengarkan dan Memberikan Bantuan Terbaik untuk Setiap Pertanyaan atau Kebutuhan Anda. Hubungi Kami Sekarang! </p>

          </div>

        </div>

      </div>

    </div>

  </div>



  

  

  <div class="untree_co-section">

    <div class="container">

      <div class="row">

        <div class="col-lg-6 mb-5 mb-lg-0">

          <form action="php/komen.php" method="post" class="contact-form" data-aos="fade-up" data-aos-delay="200">

            <div class="form-group">

                <label class="text-black" for="email">Nama</label>

                <input name="nama" type="text" class="form-control" id="nama">

            </div>



            <div class="form-group">

                <label class="text-black" for="email">Email</label>

                <input name="email" type="email" class="form-control" id="email">

            </div>



            <div class="form-group">

                <label class="text-black" for="message">Pesan</label>

                <textarea name="komentar" class="form-control" id="message" cols="30" rows="5"></textarea>

            </div>



            <button type="submit" class="btn btn-primary">Kirim Pesan</button>

        </form>

        </div>

        <div class="col-lg-5 ml-auto">

          <div class="quick-contact-item d-flex align-items-center mb-4">

            <span class="flaticon-house"></span>

            <address class="text">

              Politeknik Negeri Jember. Teknologi Informasi. Manajemen Informatika

            </address>

          </div>

          <div class="quick-contact-item d-flex align-items-center mb-4">

            <span class="flaticon-phone-call"></span>

            <address class="text">

            +62 823 3863 6603

            </address>

          </div>

          <div class="quick-contact-item d-flex align-items-center mb-4">

            <span class="flaticon-mail"></span>

            <address class="text">

            InfoKost@gmail.com

            </address>

          </div>

        </div>

      </div>

    </div>

  </div>



  <div class="row justify-content-center mt-5 section">

        <div class="col-lg-10">

          <div class="row mb-5">

            <div class="col text-center">

              <h2 class="section-title text-center">Anggota tim</h2>

            </div>

          </div>

          <div class="row">

            <div class="col-lg-3 mb-4">

              <div class="team">

                 <img src="img/profil/Adit.jpg" alt="Image" class="img-fluid mb-4" style="width: 113.37px; height: 151.16px;">

                <div class="px-3">

                  <h3 class="mb-0">Ridho Aditya</h3>

            

                </div>

              </div>

            </div>

            <div class="col-lg-3 mb-4">

              <div class="team">

                  <img src="img/profil/IQBAL_AMIN.jpeg" alt="Image" class="img-fluid mb-4" style="width: 113.37px; height: 151.16px;">

                  <div class="px-3">

                      <h3 class="mb-0">Iqbal Amin</h3>

                  </div>

              </div>



            </div>



            <div class="col-lg-3 mb-4">

              <div class="team">

                <img src="img/profil/Rama.jpg" alt="Image" class="img-fluid mb-4" style="width: 113.37px; height: 151.16px;">

                <div class="px-3">

                  <h3 class="mb-0">M. Rama Pradipa W.</h3>

                 

                </div>

              </div>

            </div>



            <div class="col-lg-3 mb-4">

              <div class="team">

                <img src="img/profil/Arya.jpg" alt="Image" class="img-fluid mb-4" style="width: 113.37px; height: 151.16px;">

                <div class="px-3">

                  <h3 class="mb-0">Arya Advicenna </h3>

                 

                </div>

              </div>

            </div>



            <div class="col-lg-3 mb-4">

              <div class="team">

                <img src="img/profil/Rey.jpg" alt="Image" class="img-fluid mb-4" style="width: 113.37px; height: 151.16px;">

                <div class="px-3">

                  <h3 class="mb-0">Reynand </h3>

                 

                </div>

              </div>

            </div>



            <div class="col-lg-3 mb-4">

              <div class="team">

                <img src="img/profil/ari.jpg" alt="Image" class="img-fluid mb-4" style="width: 113.37px; height: 151.16px;">

                <div class="px-3">

                  <h3 class="mb-0">Ari </h3>

                 

                </div>

              </div>

            </div>



          </div>

        </div>

      </div> 



      <div class="row">

    <div class="col-md-8">

        <?php

        $result = mysqli_query($koneksi, "SELECT * FROM komen");



        while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <div class="media g-mb-30 media-comment">

                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">

                    <div class="g-mb-15">

                        <h5 class="h5 g-color-gray-dark-v1 mb-0">Nama: <?php echo htmlspecialchars($row['nama']); ?></h5>

                        <span class="g-color-gray-dark-v1 mb-0">Email: <?php echo htmlspecialchars($row['email']); ?></span>

                    </div>

                    <p>Koment: </p>

                    <p><?php echo htmlspecialchars($row['komentar']); ?></p>

                </div>

            </div>
	    <br>

            <?php

        }



        // Free result set

        mysqli_free_result($result);



        // Close connection

        mysqli_close($koneksi);

        ?>

    </div>

</div>



 

  <div class="site-footer">

    <div class="inner first">

      <div class="container">

        <div class="row">

          <div class="col-md-6 col-lg-4">

            <div class="widget">

              <h3 class="heading">Tentang Kami</h3>

              <p>Solusi cepat mencari kebutuhan tempat tinggal anda</p>

            </div>

            <div class="widget">

              <ul class="list-unstyled social">

                <li><a href="#"><span class="icon-twitter"><i data-feather="twitter"></i></span></a></li> 

                <li><a href="#"><span class="icon-instagram"><i data-feather="instagram"></i></span></a></li>

                <li><a href="#"><span class="icon-facebook"><i data-feather="facebook"></i></span></a></li>

                

               

              </ul>

            </div>

          </div>

          

          

          <div class="col-md-6 col-lg-4">

            <div class="widget">

              <h3 class="heading">Contact</h3>

              <ul class="list-unstyled quick-info links">

                <li class="email"><i data-feather="mail"></i><a href="#">InfoKost@gmail.com</a></li>

                <li class="phone"><i data-feather="phone"></i><a href="#">+62 823 3863 6603</a></li>

                

              </ul>

            </div>

          </div>

        </div>

      </div>

    </div>







    <div class="inner dark">

      <div class="container">

        <div class="row text-center">

          <div class="col-md-8 mb-3 mb-md-0 mx-auto">

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Sistem Info Kos|KINT2 

            </p>

          </div>

          

        </div>

      </div>

    </div>

  </div>



  <script src="js/jquery-3.4.1.min.js"></script>

  <script src="js/popper.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <script src="js/owl.carousel.min.js"></script>

  <script src="js/jquery.animateNumber.min.js"></script>

  <script src="js/jquery.waypoints.min.js"></script>

  <script src="js/jquery.fancybox.min.js"></script>

  <script src="js/aos.js"></script>

  <script src="js/moment.min.js"></script>

  <script src="js/daterangepicker.js"></script>



  <script src="js/typed.js"></script>

  

  <script src="js/custom.js"></script>



    <script>

      feather.replace();

    </script>



</body>



</html>

