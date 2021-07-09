@extends('layouts.master')
@section('title','-Login')
@section('content')



    <style>
        img {

            border: 3px solid #555;
            border-radius: 4px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 5px;
            height: 150px;
        }

        img:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 2);
        }
    </style>

    <div id="blog" class="content-block content-block-gray">
        <div class="container">
            <header class="block-heading cleafix">
                <a href="{{route('user.gallery.show',['all'])}}" class="btn btn-o btn-lg pull-right">View All</a>
                <a href="{{route('user.gallery.show',['buy-out'])}}" class="btn btn-o btn-lg pull-right">Buy-out</a>
                <a href="{{route('user.gallery.show',['reject'])}}" class="btn btn-o btn-lg pull-right">Reject</a>
                <a href="{{route('user.gallery.show',['approved'])}}" class="btn btn-o btn-lg pull-right">Approved</a>
                <h1>USER GALLERY</h1>
                <p>Keep up with the latest happenings.</p>
            </header>
            <section class="block-body">
                <div class="row">
                    @foreach($photos as $photo)
                    <div class="col-sm-3 blog-post">
                        <a href="#"><h3 style="text-align:center;"  >{{$photo->photocaption}} </h3></a>
                        <a href="{{asset('photos/'.$photo->imagename)}}"> <img  src="{{asset('photos/'.$photo->imagename)}}" class="right" height="150px"></a>
                        <div class="date" style="text-align:center;">{{Carbon\Carbon::parse($photo->created_at)->diffForHumans()}}</div>
                        ({{$photo->status}})
                        @if ($photo->status=='approved')
                            <a class="btn btn-warning btn-sm" href="{{route('user.sell.request',[$photo->id])}}">Request for sales</a>
                        @endif
                        <br><br>

                    </div>
                    @endforeach

            </section>
        </div><!--/container-->
    </div><!-- /.content-block content-blog-gray -->



@endsection


