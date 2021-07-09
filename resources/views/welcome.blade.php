@extends('layouts.master')
@section('title','')
@section('content')
    <head>
        <style>.carousel-inner > .item > img { width:100%; height:370px; } </style>
    </head>

    <div id="carousel-header" class="carousel slide" data-ride="carousel" data-interval="5000">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="camera-icon hidden-sm hidden-xs">
                <div class="circle">
                    <div class="hexagon">
                        <i class="fa  fa-camera"></i>
                    </div>
                </div>
            </div>



            <div class="item active">
                <img src="img/slide1.jpg"  alt="">
            </div>

            @foreach($photoSlides as $photoSlide)

                <div class="item">
                    <img src="photos/{{$photoSlide->imagename}}" alt="">
                </div>

            @endforeach

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-header" role="button" data-slide="prev">
            <img src="img/left.png" alt="Previous">
        </a>
        <a class="right carousel-control" href="#carousel-header" role="button" data-slide="next">
            <img src="img/right.png" alt="Next">
        </a>
    </div>




    <div id="about" class="content-block content-block-cyan">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>The winter photographer</h1>
                    <p>
                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
