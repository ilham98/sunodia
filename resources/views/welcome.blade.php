@extends('master')

@section('title', 'Sunodia ~ Beranda')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <style>
        .berita-single img {
            margin: 10px;
            max-height: 200px;
            width: auto;
        }

        .berita-single-big {
            max-height: 300px;
            overflow: hidden;
        }

        .berita-single-big img {
            width: 100%;
            
        }

        #highlight {
            position: absolute;  
            width: 100%;
            display: flex;
            justify-content: center;
            top: 10px;
            z-index: 999;
        }

        html, body {
        position: relative;
        height: 100%;
        }

        .heading {
            height: 320px;
        }

    body {
      background: white;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }

    .swiper-container {
      max-width: 900px;
      height: 300px;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      overflow: hidden;
      width: 100%;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      position: relative;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .swiper-slide .caption {
        position: absolute;
        bottom: 50px;
        background: #e3f2fd;
        color: #0d47a1;
        border-radius: 50px;
        padding: 0px 20px;
        font-size: 14px;
    }
    

    @media only screen and (max-width: 837px) {
        .swiper-container {
            max-width: none;
            height: 300px;
        }

        .navbar.navbar-border-bottom {
            border-bottom: none;
        }

        .swiper-container img{
            height: 100%;   
        }

        .container {
            width: 100%;
        }

        #path1 {
            display: none;
        }

        .heading {
            max-height: 300px;
        }
        .navbar {
            background: #1e88e5 !important;
        }

        #highlight {
            position: static;
        }

        .swiper-slide {
            background: transparent;
        }

        #highlight {
            top: 5px;
        }

     
    }

    .swiper-button-next, .swiper-button-prev  {
        background: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-button-next::after, .swiper-button-prev::after {
        font-size: 20px;
    }

    

    </style>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
@endsection

@section('content')
    <div class="heading">
        <div id="highlight">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                     @foreach($highlights as $h)
                        <div class="swiper-slide">
                            <img src="{{ $h->url }}" alt="">
                            <a href="#" class="caption">{{ $h->keterangan }}</a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
        </div>
        <div id="path1">
            <img src="{{ asset('img/path-1.svg') }}" style="width: 100%;" alt="">
        </div>
    </div>
    <div class="container mt-3 mt-md-5">
        <h3 class="text-warning">Berita</h3>
        <div class="row mt-3">
            @foreach(array_slice($berita->toArray(), 0, 2) as $b)
                <div class="col-md-6 berita-single" style="border-right: 1px solid rgba(0, 0, 0, 0.1)">
                    <a class="h5" href="{{ url('berita/'.$b['id']) }}">{{ $b['judul'] }}</a>
                    {!! $b['first_img']  !!}
                    <p style="color: #555">{!! $b['isi'] !!}</p>
                </div>
            @endforeach
        </div>
        @if(isset($berita[2]))
            <hr>
            <div class="row">
                <div class="col-md-12 berita-single-big">
                    <h5>{{ $berita[2]->judul }}</h5>
                    <div class="row">
                        @if($berita[2]->first_img)
                            <div class="col-sm-5 d-flex justify-content-center">{!! $berita[2]->first_img !!}</div>
                        @endif
                        <div class="col-sm-7">{!! $berita[2]->isi !!}</div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="mt-5 quotes">
        <img src="{{ asset('/img/quotes.jpg') }}" alt="">
        <div>
            <p></span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam officiis laboriosam minima dolore voluptatum neque quidem voluptatem exercitationem doloremque praesentium, tempore fuga obcaecati excepturi porro repellendus necessitatibus aperiam natus delectus.</p>
        </div>
    </div>
    <div class="visi-misi mt-5 container">
        <div class="title">Visi</div>
        <div class="body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, ratione? At recusandae explicabo id corporis. Nobis autem atque nemo consequuntur accusantium perferendis excepturi ipsam maxime officiis ratione, distinctio numquam incidunt.
        </div>
        <div class="title mt-3">Misi</div>
        <div class="body">
            <ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, ut.</li>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur, nemo.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, hic.</li>
            </ul>
        </div>
        <div class="title-2 mt-3">Jenjang Pendidikan</div>
        <div class="row mt-3 py-2" style="background: rgba(247, 179, 7, 0.5); border-radius: 100px;">
            <div class="col-sm-12 d-flex align-self-start">
                <div class='jenjang text-white w-100' id="sd" data-id='1'><span>SD</span></div>
                <div class='jenjang text-white w-100' id="smp" data-id='2'><span>SMP</span></div>
                <div class='jenjang text-white w-100' id="sma" data-id='3'><span>SMA</span></div>
            </div>
            
        </div>
        <div class="mt-3" id="deskripsi-jenjang">
            <p></p>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
          pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        });
      </script>
@endsection