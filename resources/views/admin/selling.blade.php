@extends('layouts.master')
@section('title','-Buyout')
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

                <h1>BUYOUT PHOTOS</h1>
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
                                <td>{{$photo->photocaption }}</td>
                                <td>
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

                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </section>
        </div><!--/container-->
    </div><!-- /.content-block content-blog-gray -->



@endsection

