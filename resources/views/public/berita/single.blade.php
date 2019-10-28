@extends('master')

@section('title', 'Sunodia ~ Berita')

@section('css')
    <style>

        body {
            background:
                linear-gradient(135deg, #1e88e5 21px, #0067c2 22px, #0067c2 24px, transparent 24px, transparent 67px, #0067c2 67px, #0067c2 69px, transparent 69px),
                linear-gradient(225deg, #1e88e5 21px, #0067c2 22px, #0067c2 24px, transparent 24px, transparent 67px, #0067c2 67px, #0067c2 69px, transparent 69px)0 64px;
                background-color:#1e88e5;
                background-size: 64px 128px;
        }

        .berita-single img {
            margin: 10px 0px;
            max-height: 200px;
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
    <div class="container">
        <div class="berita">
            <div class="my-3 p-3 berita-single" style="background: white; box-shadow: 0px 0px 16px -5px rgba(74,74,74,1);">
                <div class="row">
                    <div class="col-md-9" style="font-weight: bold; color: #0067c2">{{ $berita->judul }}</div>
                    <div class="col-md-3 text-md-right" style="font-weight: bold">{{ date('d M Y', strtotime($berita->created_at)) }}</div>
                </div>
                <div class="mt-3s">{!! $berita->isi !!}</div>
            </div>
        </div>
    </div>
@endsection

