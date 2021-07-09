@extends('layouts.master')
@section('title','-Approve Photo')
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

                <h1>APPROVE IMAGE</h1>
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
                                    <a href="{{route('admin.approve.status',[$photo->id,'approved'])}}" class="btn btn-success">Approved</a>
                                    <a href="{{route('admin.approve.status',[$photo->id,'reject'])}}" class="btn btn-warning">Reject</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                </div>
            </section>
        </div><!--/container-->
    </div><!-- /.content-block content-blog-gray -->



@endsection
