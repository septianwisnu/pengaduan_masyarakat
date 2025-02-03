@extends("layoutsmasyarakat.app")
@section("content")

<main class="main">

   <!-- Hero Section -->
<section id="hero" class="hero section light-background">

  <img src="{{ asset('assets/img/banjar.jpg') }}" alt="Gambar Desa Rejasari" data-aos="fade-in">

  <div class="container position-relative">

    <div class="welcome position-relative text-center" data-aos="fade-down" data-aos-delay="100">
      <h2>SELAMAT DATANG DI <span style="color: var(--accent-color);">SUARA REJASARI</span></h2>
      <p>"Laporkan keluhan anda untuk membangun desa<br>
        lebih baik. <strong>Suara anda</strong>, perubahan untuk kita semua."</p>
    </div><!-- End Welcome -->

    <div class="content row gy-4">
      <div class="col-lg-4 d-flex align-items-stretch">
        <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
          <p>
            <strong>“Suara Rejasari”</strong> adalah aplikasi pengaduan masyarakat yang dibuat untuk memberikan kemudahan bagi warga desa 
            Rejasari dalam menyampaikan keluhan dan aspirasinya.
          </p>
          <div class="text-center">
            <a href="#about" class="more-btn"><span>Bergabung Sekarang</span> <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div><!-- End Why Box -->

      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="d-flex flex-column justify-content-center">
          <div class="row gy-4">

            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                <i class="fa-solid fa-bolt"></i>
                <h4>Cepat dan Mudah</h4>
                <p>Kirim pengaduan anda dengan proses yang cepat dan sederhana.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                <i class="fa-solid fa-eye"></i>
                <h4>Transparan</h4>
                <p>Pantau status pengaduan anda secara real-time.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                <i class="fa-solid fa-shield-alt"></i>
                <h4>Aman dan Terpercaya</h4>
                <p>Data anda terlindungi dengan baik dan dijamin keamanannya.</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>
      </div>
    </div><!-- End Content -->

  </div>

</section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4 gx-5">

          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/yt.png" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=H9mA5bQOJNk" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>About Suara Rejasari</h3>
            <p>
              Suara Rejasari adalah sebuah platform pengaduan masyarakat berbasis web yang dirancang untuk mempermudah warga Desa Rejasari dalam melaporkan berbagai permasalahan atau kejadian yang memerlukan perhatian. Sistem ini memungkinkan warga untuk menyampaikan laporan dengan cepat dan mudah, serta memantau perkembangan penyelesaiannya secara transparan. Selain itu, Suara Rejasari juga menjadi sarana komunikasi langsung antara masyarakat dan pemerintah desa untuk memberikan respon yang lebih efektif terhadap kebutuhan warga. Dengan hadirnya platform ini, diharapkan partisipasi masyarakat dalam menciptakan lingkungan yang lebih baik semakin meningkat, sekaligus membantu pemerintah desa mengelola dan menyelesaikan permasalahan secara efisien. Suara Rejasari adalah langkah nyata menuju Desa Rejasari yang lebih maju dan baik.
            </p>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
<section id="stats" class="stats section light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 d-flex justify-content-center"> <!-- Pusatkan semua item -->
      
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
        <i class="fa-solid fa-user"></i>
        <div class="stats-item text-center">
          <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
          <p>Masyarakat</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
        <i class="fa-regular fa-file-alt"></i>
        <div class="stats-item text-center">
          <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
          <p>Laporan</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
        <i class="fa-solid fa-file-invoice"></i>
        <div class="stats-item text-center">
          <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
          <p>Laporan Di Tanggapi</p>
        </div>
      </div><!-- End Stats Item -->

    </div>

  </div>
</section><!-- /Stats Section -->

    <!-- Services Section -->
<section id="services" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Timeline Pengaduan</h2>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <!-- Step 1 -->
      <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-edit"></i>
          </div>
          <h3>Tulis Pengaduan</h3>
          <p>Tulis pengaduan anda atau aspirasi anda dengan singkat dan jelas.</p>
        </div>
      </div><!-- End Step 1 -->

      <!-- Step 2 -->
      <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-search"></i>
          </div>
          <h3>Ditinjau</h3>
          <p>Laporan anda akan diverifikasi atau ditinjau terlebih dahulu sebelum diproses untuk tahap selanjutnya.</p>
        </div>
      </div><!-- End Step 2 -->

      <!-- Step 3 -->
      <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-cogs"></i>
          </div>
          <h3>Diproses</h3>
          <p>Pada tahap ini laporan pengaduan anda akan kami cek lebih lanjut untuk informasi yang anda laporkan.</p>
        </div>
      </div><!-- End Step 3 -->

      <!-- Step 4 -->
      <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-tasks"></i>
          </div>
          <h3>Ditindaklanjuti</h3>
          <p>Kami akan melakukan langkah-langkah penanganan sesuai pengaduan yang dilaporkan.</p>
        </div>
      </div><!-- End Step 4 -->

      <!-- Step 5 -->
      <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-check-circle"></i>
          </div>
          <h3>Proses Selesai</h3>
          <p>Kami akan memberikan tanggapan terhadap laporan anda bahwa pengaduan telah selesai.</p>
        </div>
      </div><!-- End Step 5 -->

    </div>

  </div>

</section><!-- /Services Section -->


  <!-- Reporting Guide Section -->
<section id="panduan-melapor" class="py-5 bg-light">
  <div class="container">
    <!-- Section Title -->
    <div class="section-title text-center mb-4">
      <h2 class="fw-bold">Tata Cara Melapor di Suara Rejasari</h2>
      <p class="text-muted">Ikuti langkah-langkah berikut agar laporan Anda dapat diproses dengan baik.</p>
    </div>

    <!-- Steps -->
    <div class="row g-4">
      <div class="col-md-6 col-lg-4" data-aos="fade-up">
        <div class="d-flex align-items-start">
          <div class="icon bg-primary text-white rounded-circle me-3 p-3">
            <i class="fas fa-user"></i>
          </div>
          <div>
            <h5 class="fw-semibold">Login atau Daftar</h5>
            <p class="text-muted">Masuk ke akun Anda atau daftar jika belum memiliki akun. Gunakan email aktif untuk verifikasi.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="d-flex align-items-start">
          <div class="icon bg-primary text-white rounded-circle me-3 p-3">
            <i class="fas fa-file-alt"></i>
          </div>
          <div>
            <h5 class="fw-semibold">Akses Formulir Pengaduan</h5>
            <p class="text-muted">Setelah login, pilih "Formulir Pengaduan" di halaman Beranda untuk memulai laporan.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="d-flex align-items-start">
          <div class="icon bg-primary text-white rounded-circle me-3 p-3">
            <i class="fas fa-pencil-alt"></i>
          </div>
          <div>
            <h5 class="fw-semibold">Isi Informasi Pengaduan</h5>
            <p class="text-muted">Isi judul, deskripsi masalah, pilih kategori, dan lampirkan foto terkait jika ada.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="d-flex align-items-start">
          <div class="icon bg-primary text-white rounded-circle me-3 p-3">
            <i class="fas fa-paper-plane"></i>
          </div>
          <div>
            <h5 class="fw-semibold">Kirim Pengaduan</h5>
            <p class="text-muted">Setelah semua data terisi dengan benar, klik kirim untuk mengajukan laporan Anda.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="d-flex align-items-start">
          <div class="icon bg-primary text-white rounded-circle me-3 p-3">
            <i class="fas fa-search"></i>
          </div>
          <div>
            <h5 class="fw-semibold">Cek Status Aduan</h5>
            <p class="text-muted">Pantau status laporan Anda secara berkala di halaman "Profil" untuk melihat perkembangannya.</p>
          </div>
        </div>
      </div>

      <div class="col-12 text-center mt-4">
        <p class="text-muted fst-italic">Laporan Anda sangat berarti dalam membangun Desa Rejasari yang lebih baik.</p>
      </div>
    </div>
  </div>
</section>


  <!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
        <h3>Testimonials</h3>
        <p>
          Layanan kami telah membantu banyak pengguna dengan cara yang cepat, mudah, dan terpercaya. Berikut adalah beberapa pengalaman mereka.
        </p>
      </div>
      <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="d-flex">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img flex-shrink-0" alt="">
                  <div>
                    <h3>Ahmad Rizky</h3>
                    <h4>Pengusaha</h4>
                    <div class="stars">
                      <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                  </div>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Layanan ini sangat cepat dan mudah digunakan! Saya merasa lebih aman dan nyaman dalam menggunakannya.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="d-flex">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img flex-shrink-0" alt="">
                  <div>
                    <h3>Siti Aisyah</h3>
                    <h4>Desainer Grafis</h4>
                    <div class="stars">
                      <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                  </div>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Transparansi layanan ini luar biasa! Saya selalu mendapatkan laporan masuk tepat waktu dan jelas.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="d-flex">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img flex-shrink-0" alt="">
                  <div>
                    <h3>Budi Santoso</h3>
                    <h4>Freelancer</h4>
                    <div class="stars">
                      <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                  </div>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Saya sangat merekomendasikan layanan ini karena aman dan terpercaya. Tidak ada kendala yang saya hadapi sejauh ini!</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Testimonials Section -->


  </main>
@endsection