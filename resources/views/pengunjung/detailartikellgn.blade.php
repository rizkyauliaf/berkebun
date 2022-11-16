@extends('layoutpengunjung.master')
@section('content')
@include('layoutpengunjung.navbarlogin')

<!-- ======= Artikel Details Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>DETAIL ARTIKEL</h2>
        </div>

        <div class="row g-5">
            <div class="col-md-8 offset-lg-2">
                <article class="blog-details">
                    <div class="post-img">
                        <img src="{{ url('/storage/'.$artikel->gambar_artikel) }}" alt="" style="width:100%; height:100%" class="img-fluid">
                    </div>
                    <h2 class="title">{{$artikel->judul}}</h2>
                    <div class="content">
                        <p>
                            {{$artikel->isi_artikel}}
                        </p>
                    </div><!-- End post content -->

</section>
<!-- End Artikel Section -->

@include('layoutpengunjung.footer')
@endsection