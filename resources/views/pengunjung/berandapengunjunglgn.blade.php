@extends('layoutpengunjung.master')
@section('content')
@include('layoutpengunjung.navbarlogin')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
  <div class="container position-relative">
    <div class="row gy-5" data-aos="fade-in">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
        <h2>SELAMAT DATANG DI <span>AGROWISATA</span></h2>
      </div>
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="pengunjung/assets/img/logo.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        <br><br>
      </div>
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>TENTANG KAMI</h2>
      </div>

      <div class="portfolio-isotope">
        <div class="row gy-4 portfolio-container">

          <div class="col-xl-12 portfolio-item filter-product" style="margin-left:5%;width:90%;">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="pengunjung/assets/img/home/str1.jpg" style="width:100%; height:500px">
                </div>
                <div class="carousel-item">
                  <img src="pengunjung/assets/img/home/apel.jpeg" style="width:100%; height:500px">
                </div>
                <div class="carousel-item">
                  <img src="pengunjung/assets/img/home/str2.jpg" style="width:100%; height:500px">
                </div>
                <div class="carousel-item">
                  <img src="pengunjung/assets/img/home/jeruk.jpg" style="width:100%; height:500px">
                </div>
                <div class="carousel-item">
                  <img src="pengunjung/assets/img/home/naga.jpg" style="width:100%; height:500px">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <br><br><br>
            <div class="row gy-4">
              <div class="col-lg-6">
                <h3>Welcome to Agrowisata</h3>
                <img src="pengunjung/assets/img/home/agr.jpg" class="img-fluid rounded-4 mb-4">
              </div>
              <div class="col-lg-6">
                <div class="content ps-0 ps-lg-5">
                  <ul><br><br>
                    Agrowisata berdiri pada 1991 dan merupakan salah satu pioneer Wisata Agro di Indonesia.
                    Di Wisata Agro kami menawarkan wisata berkebun dan memetik buah di kebun apel, jeruk, jambu merah, buah naga, dan strawberry.
                    Area wisata kami terletak pada ketinggian ± 1000 meter dari permukaan laut dan berudara sejuk.
                    Anda dapat memetik sendiri buah-buah tersebut fresh langsung dari pohon sambil berkeliling ditemani oleh pemandu kami.
                    Pemandu kami akan menjelaskan tentang budidaya tanaman dan hal-hal yang berkaitan tentang buah-buah tersebut.

                  </ul>
                </div>
              </div>
            </div>
          </div><!-- End About Container -->
        </div>
      </div>

      <!-- ======= Tatacara Section ======= -->
      <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
          <div class="row gy-4">
            <div class="col-lg-4">
              <div class="content px-xl-5">
                <h3>Cara Melakukan <strong>Reservasi</strong></h3>
                <p>
                  Berikut ini adalah tatacara melakukan reservasi berkebun
                </p>
              </div>
            </div>

            <div class="col-lg-8">
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <div class="accordion-button collapsed">
                    <span class="num">1.</span>
                    Melakukan login pada menu "LOGIN". Jika belum memiliki akun maka lakukan register
                  </div>
                </h3>
              </div><!-- # item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <div class="accordion-button collapsed">
                    <span class="num">2.</span>
                    Daftar reservasi pada menu "RESERVASI" dengan menginputkan semua data yang dibutuhkan. Kemudian klik daftar
                  </div>
                </h3>
              </div><!-- # item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <div class="accordion-button collapsed">
                    <span class="num">3.</span>
                    Tunggu status pada history. Jika sukses maka cetak invoice, jika gagal lakukan reservasi kembali
                  </div>
                </h3>
              </div><!-- # item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <div class="accordion-button collapsed">
                    <span class="num">4.</span>
                    Invoice harap dibawa saat berkebun untuk melakukan pembayaran
                  </div>
                </h3>
              </div><!-- # item-->
            </div>

          </div>
        </div>
    </div>
  </section><!-- End Tatacara Section -->
</section><!-- End About Section -->
@include('layoutpengunjung.footer')
@endsection