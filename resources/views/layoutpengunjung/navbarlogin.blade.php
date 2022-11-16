  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
          <div class="contact-info d-flex align-items-center">
              <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">agrowisata@gmail.com</a></i>
              <i class="bi bi-phone d-flex align-items-center ms-4"><span>081 888 999 000</span></i>
          </div>
          <div class="social-links d-none d-md-flex align-items-center">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
          </div>
      </div>
  </section>

  <header id="header" class="header d-flex align-items-center">

      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
          <a href="index.html" class="logo d-flex align-items-center">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <!-- <img src="assets/img/logo.png" alt=""> -->
              <h1>AGROWISATA<span>.</span></h1>
          </a>
          <nav id="navbar" class="navbar">
              <ul>
                  <li><a href="/berandapengunjunglgn">BERANDA</a></li>
                  <li><a href="/jenispaketpengunjunglgn">JENIS PAKET</a></li>
                  <li><a href="/galeripengunjunglgn">GALERI</a></li>
                  <li><a href="/artikelpengunjunglgn">ARTIKEL</a></li>
                  <li class="dropdown"><a href="#"><span>RESERVASI</span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                          <li><a href="/reservasi">DAFTAR RESERVASI</a></li>
                          <li><a href="/history">HISTORY RESERVASI</a></li>
                      </ul>
                  </li>
                  <li><a href="/profilpengunjung/{{Auth::user()->id}}"><img src="pengunjung/assets/img/profile1.png">&nbsp;&nbsp;{{ Auth::user()->name }}</a></li>
                  <li><a href="/auth/logout">LOGOUT</a></li>
              </ul>
          </nav><!-- .navbar -->

          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      </div>
  </header><!-- End Header -->
  <!-- End Header -->