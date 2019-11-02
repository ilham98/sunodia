@extends('persekolah.master')

@section('title', strtoupper($tingkat).' Sunodia ~ Beranda')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet"> 
    <style>
        html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }

    .swiper-container {
      width: 100%;
      height: 400px;
    }

    .swiper-container > .swiper-wrapper > .swiper-slide {
      text-align: center;
      background: #ffff8d;
      width: calc(40% - 25px);
    }

    .swiper-container > .swiper-wrapper > .swiper-slide.large {
      width: calc(60% - 25px);
    }
    
    .swiper-container-2 {
        width: 100%;
        overflow: hidden;
    }

    .swiper-container-2 > .swiper-wrapper > .swiper-slide {
        width: 100%;
    }

    .swiper-slide .nama {
        font-size: 20px;
        margin-top: -70px;
        padding: 10px 20px;
        width: 100%;
        font-weight: bold;
        background: #ffea00;
        font-family: arial;
    }

    .swiper-slide .juara-ke {
        font-size: 25px;
        margin-top: 3px; 
        font-weight: bold;
        font-family: 'Libre Baskerville', serif;
    }

    .swiper-slide .nama-lomba {
        font-size: 15px;
    }

    .swiper-slide .tingkat {
        font-size: 12px;
    }

    .swiper-slide .image-container {
        max-height: 70%;
        overflow: hidden;
    }

    .swiper-slide img {
        width: 100%;
        z-index: 1;
    }

    .card {
        border: none;
    }

    .berita {
        padding: 5px 10px;
        background: #90caf9;
        color: #0d47a1;
        border-radius: 50px;
        display: inline-block;
    }

    .date {
        padding: 5px 10px;
        background: #ffff8d;
        color: #f9a825;
        border-radius: 50px;
        font-weight: bold;
    }
    </style>
@endsection

@section('content')
    <div class="container mt-3">
        <div class="card w-100" style="border-radius: 0px">
            <div class="card-body">
                <h5 class="card-title" style="background: #e3f2fd; display: inline-block; padding: 10px 20px; border-radius:30px; color: #2196f3"> <img style="margin-right: 10px" src="{{ asset('img/newspaper.png') }}" height='30' alt=""> Berita</h5>
                @foreach($berita as $b)
                <div class="mb-3">
                    <div class="d-flex justify-content-between my-3 align-items-start">
                        <div style="font-size: 18px">{{ $b->judul }}</div>
                        <div class="date">{{ date('m-d-Y', strtotime($b->created_at)) }}</div>
                    </div>
                    
                    <div style="color: #555">{{ substr(\Soundasleep\Html2Text::convert($b->isi), 0, 200) }}...</div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ url($tingkat.'/berita/'.$b->id) }}" class=" btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>  
                <hr>
                @endforeach 
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="card w-100 b-0" style="border-radius: 0px; background: #ffea00">
            <div class="card-body">
                <h5 class="card-title" style="background: white; display: inline-block; padding: 10px 20px; border-radius:30px"> <img style="margin-right: 10px" src="{{ asset('images/trophy.png') }}" height='30' alt=""> Prestasi</h5>
                <div>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($prestasi as $p)
                                <div class="swiper-slide {{ count(explode(',', $p->nama)) > 1 ? 'large' : '' }}">
                                    <div class="image-container">
                                        <img src="{{ $p->url }}" alt="">
                                    </div>
                                    <div style="margin-top: 5px 10px; padding: 10px; position: absolute; width: 100%;">
                                        <div class="nama swiper-container-2">
                                            <div class="swiper-wrapper">
                                                @foreach(explode(',', $p->nama) as $n)
                                                    <div class="swiper-slide">{{ $n }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="juara-ke">Juara {{ $p->juara }}</div>
                                    <div class="nama-lomba" style="margin-top: 3px">{{ $p->nama_lomba }}</div>
                                    <div class="tingkat" style="margin-top: 3px">{{ $p->tingkat_lomba }}</div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
 <!-- Swiper JS -->
 <script src="{{ asset('js/swiper.js') }}"></script>

 <!-- Initialize Swiper -->
 <script>
   var swiper = new Swiper('.swiper-container', {
     slidesPerView: 1,
     autoplay: {
        delay: 6000,
    },
     spaceBetween: 10,
     pagination: {
       el: '.swiper-pagination',
       clickable: true,
     },
     breakpoints: {
       640: {
         slidesPerView: 'auto',
         spaceBetween: 50,
       },
     }
   });

   var swiper2 = new Swiper('.swiper-container-2', {
     slidesPerView: 1,
     autoplay: {
        delay: 2000,
    },
     spaceBetween: 10,
     breakpoints: {
       640: {
         slidesPerView: 1,
         spaceBetween: 50,
       },
     }
   });
 </script>
@endsection