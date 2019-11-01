<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        @yield('css')
        <style>
            @import url('https://fonts.googleapis.com/css?family=Arima+Madurai:300');

            .sunodia-main-title {
                font-family: 'Arima Madurai', cursive;
            }

            .btn-daftar {
                background: #ff8f00;
                color: white;
            }

            .btn-daftar:hover  {
                color: white;
                background: #ff6f00;
            }

            @media(max-width: 837px) {
                #navbarCotainter {
                    position: static; 
                }                
            }

            .registrasi-siswa-header {
                margin: 0;
                width: 100%;
                font-family: 'Neuton', serif;
                color: #fff;
                background: linear-gradient(-45deg, #01579b, #0d47a1, #e65100, #ffb74d);
                background-size: 400% 400%;
                animation: gradientBG 60s ease infinite;
                border-bottom: 2px solid white;
            }

            @keyframes gradientBG {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

            .footer p{
                font-size: 15px;
            }

            .footer h4 {
                font-weight: bold;
            }

            .footer .telepon {
                margin: 0px;
            }

            .footer .email {
                position: relative;
                background: #f5ac0f;
                padding: 5px 10px;
                font-weight: bold;
                display: inline-block;
                color: white;
                z-index: 89;
            }
        </style>
        @yield('footer-css')
    </head>
    <body>
        @if(!(Request::is('registrasi/*') || url()->current() == url('registrasi')) && \App\Konfigurasi::first()->registrasi_open)
            @include('components/registrasi-header')
        @endif
        <div class="d-flex justify-content-center sunodia-main-title" style="background: #1e88e5">
            <div class="text-center">
                <img src="{{ asset('img/logo.png') }}" width="150" height="150" alt="">
                <h4 class="text-white">Sekolah Kristen  Sunodia Samarinda</h4>
            </div>
        </div>
        <div id="navbarContainer" style="z-index: 99; width: 100%;">
            <nav id="navbar" style='{{ url()->current() != url('/') ? "background: #0067c2;" : "background: #1e88e5;" }}' class="navbar {{ url()->current() == url('/') ? 'navbar-border-bottom' : '' }} navbar-expand-md navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/berita') }}">Berita <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sekolah
                            </a>
                            <div class="dropdown-menu bg-white" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('sma') }}">SMA Sunodia</a>
                                <a class="dropdown-item" href="{{ url('smp') }}">SMP Sunodia</a>
                                <a class="dropdown-item" href="{{ url('sd') }}">SD Sunodia</a>
                                <a class="dropdown-item" href="{{ url('tk-kb') }}">TK & KB Sunodia</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tentang Kami
                            </a>
                            <div class="dropdown-menu bg-white" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('sejarah') }}">Sejarah</a>
                                <a class="dropdown-item" href="{{ url('logo') }}">Logo</a>
                                <a class="dropdown-item" href="{{ url('visi-misi') }}">Visi & Misi</a>
                                <a class="dropdown-item" href="{{ url('mars') }}">Mars</a>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('galeri') }}">Galeri</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('login') }}">Login</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        @yield('content')
        @include('components.footer')
        
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $('.jenjang').hover(
                function() {
                    var id = $(this).data('id');
                    $(this).css({ 'border-radius' : '100px' }).addClass('w-100');
                    if(id == 1)
                        $(this).append(`<p class='animated fadeInDown faster'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, accusamus aspernatur praesentium tempore aperiam voluptatem autem, quia pariatur error sit assumenda, laboriosam beatae eos qui. Laborum possimus adipisci hic nulla?</p>`);
                    else if(id == 2)
                        $(this).append(`<p class='animated fadeInDown faster'>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam officia nesciunt mollitia totam repellat, nihil, similique sapiente inventore consequuntur autem alias fuga dolor eum doloribus voluptatibus harum? Possimus, libero incidunt.</p>`);
                    else 
                        $(this).append(`<p class='animated fadeInDown faster'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, accusamus aspernatur praesentium tempore aperiam voluptatem autem, quia pariatur error sit assumenda, laboriosam beatae eos qui. Laborum possimus adipisci hic nulla?</p>`);
                   $(this).siblings().hide();
                },
                function() {
                    $(this).find('p').remove();
                    $(this).siblings().show();
                    $('.jenjang').css({ 'border-radius': 0 });
                    $('#sd').css({ 'border-top-left-radius': '100px', 'border-bottom-left-radius': '100px' });
                    $('#smp').css({ 'border': '0' });
                    $('#sma').css({ 'border-top-right-radius': '100px', 'border-bottom-right-radius': '100px' });
                }
            )

            $('#btn-close-navbar').click(function() {
                $('.navbar-collapse').collapse('hide');
            })
        </script>
        @yield('js')
    </body>
</html>
