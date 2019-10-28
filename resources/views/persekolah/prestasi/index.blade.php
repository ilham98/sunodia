@extends('persekolah.master')

@section('title', 'Dashboard '.strtoupper($tingkat))

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
    
    .swiper-container-2 {
        width: 100%;
        overflow: hidden;
    }

    .swiper-container-2 > .swiper-wrapper > {
        width: 100%;
    }

    .nama {
        text-align: center;
        font-size: 20px;
        margin-top: -70px;
        padding: 10px 20px;
        width: 100%;
        font-weight: bold;
        background: #ffea00;
        font-family: arial;
    }

    .juara-ke {
       text-align: center;
        font-size: 25px;
        margin-top: 3px; 
        font-weight: bold;
        font-family: 'Libre Baskerville', serif;
    }

    .nama-lomba {
        text-align: center;
        font-size: 15px;
        width: 100%;
    }

    .tingkat {
        text-align: center;
        font-size: 12px;
    }

    .image-container {
        max-height: 70%;
        overflow: hidden;
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

    .juara-container {
      background: white;
      position: relative;
      
    }
    </style>
@endsection

@section('content')
    <div class="container mt-3">
        <div class="card w-100 b-0" style="border-radius: 0px; background: #ffea00">
            <div class="card-body">
                <h5 class="card-title" style="background: white; display: inline-block; padding: 10px 20px; border-radius:30px"> <img style="margin-right: 10px; height: 30px; width: 30px" src="{{ asset('images/trophy.png') }}" alt=""> Prestasi</h5>
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach($prestasi as $p)
                      <div class="juara-container m-2" style="width: {{ count(explode(',', $p->nama)) == 1 ? '400' : '600' }}px">
                          <div class="image-container">
                              <img style="width: 100%" src="{{ $p->url }}" alt="">
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
                          <div class="nama-lomba" style="margin-top: 3px">Asah Terampil Matematika</div>
                          <div class="tingkat" style="margin-top: 3px">Tingkat Samarinda</div>
                      </div>
                    @endforeach
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