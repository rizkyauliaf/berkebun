@extends('layoutpengunjung.master')
@section('content')
@include('layoutpengunjung.navbarlogin')

<!-- ======= Artikel Section ======= -->
<section id="artikel" class="artikel sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>ARTIKEL</h2>
        </div>

        <div class="row gy-4">
            @foreach($data as $i => $artikel)
            <div class="col-xl-4 col-md-6">
                <article>

                    <div class="post-img">
                        <img src="{{ url('/storage/'.$artikel->gambar_artikel) }}" style="width:100%; height:100%">
                    </div>

                    <p class="post-category">AGROWISATA</p>

                    <h2 class="title">
                        <a href="{{ url('/detailartikellgn', ['id_artikel' => $artikel->id_artikel]) }}">{{$artikel->judul}}</a>
                    </h2>

                </article>
            </div><!-- End artikel list item -->
            @endforeach
        </div><!-- End recent artikel list -->

    </div>
</section>
<!-- End Artikel Section -->

@include('layoutpengunjung.footer')
@endsection