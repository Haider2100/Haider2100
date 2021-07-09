@extends('layouts.master')
@section('title','-Admin Gallery')
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
                <a href="{{route('admin.gallery.show',['all'])}}" class="btn btn-o btn-lg pull-right">View All</a>
                <a href="{{route('admin.gallery.show',['decline'])}}" class="btn btn-o btn-lg pull-right">Decline</a>
                <a href="{{route('admin.gallery.show',['reject'])}}" class="btn btn-o btn-lg pull-right">Reject</a>
                <a href="{{route('admin.gallery.show',['selling'])}}" class="btn btn-o btn-lg pull-right">Buy-out</a>
                <a href="{{route('admin.gallery.show',['approved'])}}" class="btn btn-o btn-lg pull-right">Waiting</a>
                <a href="{{route('admin.gallery.show',['pending'])}}" class="btn btn-o btn-lg pull-right">Approved</a>

                <h1>PHOTO INFORMATION</h1>
            </header>

            <section class="block-body">
                <div class="container">

                    <table style="widhth:100%;" border="1px">
                        <thead>
                        <th>Image </th>
                        <th>Name </th>
                        <th>Action </th>
                        </thead>
                        @foreach($photos as $photo)
                            <tr>
                                <td> <img  src="{{asset('photos/'.$photo->imagename)}}" class="right" height="150px"></td>
                                <td>{{$photo->photocaption}}</td>
                                <td>
                                    @if($photo->status=='pending')
                                    <a href="{{route('admin.approve.status',[$photo->id,'approved'])}}" class="btn btn-success">Approved</a>
                                    <a href="{{route('admin.approve.status',[$photo->id,'reject'])}}" class="btn btn-warning">Reject</a>

                                    @elseif($photo->status=='approved')
                                        <a>Wait for user response.</a>
                                    @elseif($photo->status=='selling')
                                        <form class="form-group" method="POST" action="{{route('admin.buyout')}}">
                                            {{csrf_field()}}
                                            <input class="form-control" type="hidden" name="photo_id" value="{{$photo->id}}">
                                            <input class="form-control" type="number" name="rate" step="any"><br>
                                            <select name="status">
                                                <option value=""></option>
                                                <option value="buy-out">Buy-out</option>
                                                <option value="decline">Declined</option>
                                            </select>
                                            <input class="btn btn-success" type="submit" name="submit" value="Save">

                                        </form>
                                    @elseif($photo->status=='buy-out')
                                        <a>Already Purchased.</a>
                                    @elseif($photo->status=='decline')
                                        <a>Photo decline for buy.</a>
                                    @elseif($photo->status=='reject')
                                        <a>Photo rejected to approved.</a>
                                    @else
                                        <a>Somethings Happened </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </section>
        </div><!--/container-->
    </div><!-- /.content-block content-blog-gray -->



@endsection

