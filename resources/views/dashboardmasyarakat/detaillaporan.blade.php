@extends('layoutsmasyarakat.app')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="#">Pengaduanku</a></li>
                    <li>Detail</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                                <img src="assetsuser/img/portfolio/portfolio-1.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Limbah Pabrik ABCD</h3>
                        <ul>
                            <li><strong>Category</strong>: Pencemaran</li>
                            <li><strong>Tanggal Pengaduan</strong>: 01 March, 2020</li>
                            <li><strong>Status Pengaduan</strong>: <small class="inf inf-process">Process</small></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <p>
                            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi
                            labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque
                            itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur
                            dignissimos. Sequi nulla at esse enim cum deserunt eius.
                        </p>
                    </div>
                    <a href="user-pengaduanku.html" class="btn btn-warning btn-md">Kembali</a>
                </div>

            </div>

        </div>
    </section>

</main><!-- End #main -->
@endsection