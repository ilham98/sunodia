@extends('master')

@section('title', 'Sunodia ~ Logo')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Alice&display=swap" rel="stylesheet"> 
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


        h3 {
            color: #0067c2;
            font-family: 'Alice', serif;
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
                <h3>Logo</h3>
                <div class="my-3">
                    {!! $logo !!}
                </div>
            </div>
        </div>
    </div>
@endsection

