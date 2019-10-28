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

            .btn-warning {
                background: #fff9c4;
                color: #e65100;
                font-weight: bold;
            }

            .btn-warning:hover {
                color: #e65100;
                background: #fff59d;
            }

            body {
            background-color: #ffff8d;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='88' height='24' viewBox='0 0 88 24'%3E%3Cg fill-rule='evenodd'%3E%3Cg id='autumn' fill='%23ffff00' fill-opacity='0.4'%3E%3Cpath d='M10 0l30 15 2 1V2.18A10 10 0 0 0 41.76 0H39.7a8 8 0 0 1 .3 2.18v10.58L14.47 0H10zm31.76 24a10 10 0 0 0-5.29-6.76L4 1 2 0v13.82a10 10 0 0 0 5.53 8.94L10 24h4.47l-6.05-3.02A8 8 0 0 1 4 13.82V3.24l31.58 15.78A8 8 0 0 1 39.7 24h2.06zM78 24l2.47-1.24A10 10 0 0 0 86 13.82V0l-2 1-32.47 16.24A10 10 0 0 0 46.24 24h2.06a8 8 0 0 1 4.12-4.98L84 3.24v10.58a8 8 0 0 1-4.42 7.16L73.53 24H78zm0-24L48 15l-2 1V2.18A10 10 0 0 1 46.24 0h2.06a8 8 0 0 0-.3 2.18v10.58L73.53 0H78z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        </style>
    </head>
    <body>
        @if(!(Request::is('registrasi/*') || url()->current() == url('registrasi')) && \App\Konfigurasi::first()->registrasi_open)
            <div style="height: 100px; display: flex; justify-content: center; align-items: center; background:  #f6ff78">
                <div class="text-center">
                    <div>Pendaftaran Tahun Pembelajaran {{ \App\Konfigurasi::first()->tahun_pembelajaran }}/{{ \App\Konfigurasi::first()->tahun_pembelajaran + 1 }} Telah Dibuka</div>
                    <a href="/registrasi" class="btn btn-daftar mt-2"> Registrasi</a>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center sunodia-main-title" style="background: #1e88e5">
            <div class="text-center">
                <img src="{{ asset('img/logo.png') }}" width="150" height="150" alt="">
                <h4 class="text-white">{{ strtoupper($tingkat) }} Kristen  Sunodia</h4>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item mt-3 mt-sm-0">
                    <a  href="{{ url('/') }}" class="btn btn-warning">Website Utama Sunodia</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</span></a>
                </li>
                <li class="nav-item active">
                        <a class="nav-link" href="#">Berita</span></a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url($tingkat.'/profil') }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url($tingkat.'/struktur-organisasi') }}">Struktur Organisasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url($tingkat.'/fasilitas') }}">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url($tingkat.'/agenda-sekolah') }}">Agenda Sekolah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Prestasi</a>
                </li>
            </ul>
        </div>
        </nav>
        @yield('content')
        <footer class="footer">
           
        </footer>
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
