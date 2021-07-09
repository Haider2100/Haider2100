@extends('layouts.master')
@section('title','-Cashout History')
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

            <section class="block-body">
                <div class="container">
                    <h1>CASHOUT HISTORY</h1>
                    <table style="width:100%;" border="1px">
                        <thead>
                        <th>USER NAME </th>
                        <th>AMOUNT </th>
                        <th>DATE </th>
                        <th>ACTION </th>
                        </thead>
                        @foreach($cashoutHistorys as $cashout)
                            <tr>
                                <td>{{$cashout->user->username}} </td>
                                <td>{{$cashout->amount}}</td>
                                <td>{{\Carbon\Carbon::parse($cashout->created_at)->format('Y-m-d')}}</td>
                                <td><p>{{$cashout->status}}</p></td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </section>
        </div><!--/container-->
    </div><!-- /.content-block content-blog-gray -->



@endsection
