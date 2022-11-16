@extends('layoutpengunjung.master')
@section('content')
@include('layoutpengunjung.navbar')

<!-- ======= Galeri Section ======= -->
<section id="galeri" class="galeri sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>GALERI</h2>
        </div>

        <div class="row gy-4 galeri-container">
            @foreach($data as $i => $galeri)
            <div class="col-xl-4 col-md-6">
                <div class="galeri-wrap">
                    <a href="{{ url('/storage/'.$galeri->gambar_galeri) }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ url('/storage/'.$galeri->gambar_galeri) }}" style="width:100%; height:100%" alt=""></a>
                </div>
            </div><!-- End galeri Item -->
            @endforeach

        </div><!-- End galeri Container -->

    </div>

    </div>
</section><!-- End galeri Section -->

@include('layoutpengunjung.footer')
@endsection