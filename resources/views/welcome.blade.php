@extends('master')

@section('title', 'Sunodia ~ Beranda')

@section('css')
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

        @media only screen and (max-width: 800px) {
            #highlight {
                top: 56px;
            }
        }

    </style>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
@endsection

@section('content')
    <div class="heading">
        <div id="highlight">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('img/slide-1.jpg') }}" class="d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('img/slide-2.jpg') }}" class="d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('img/slide-3.jpg') }}" class="d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div id="path1">
            <img src="{{ asset('img/path-1.svg') }}" style="width: 100%;" alt="">
        </div>
    </div>
    <div class="container mt-5">
        <h3 class="text-warning">Berita</h3>
        <div class="row mt-3">
            @foreach(array_slice($berita->toArray(), 0, 2) as $b)
                <div class="col-md-6 berita-single" style="border-right: 1px solid rgba(0, 0, 0, 0.1)">
                    <h5>{{ $b['judul'] }}</h5>
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

