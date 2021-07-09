@extends('layouts.master')
@section('title','-Cashout Summary')
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
                    <h1>CASHOUT SUMMARY</h1>
                    <table style="width:100%;" border="1px">
                        <thead>
                        <th>USER NAME </th>
                        <th>AMOUNT </th>
                        <th>DATE </th>
                        <th>ACTION </th>
                        </thead>
                        @foreach($cashoutSummarys as $cashout)
                            <tr>
                                <td>{{$cashout->user->username}} </td>
                                <td>{{$cashout->amount}}</td>
                                <td>{{\Carbon\Carbon::parse($cashout->created_at)->format('Y-m-d')}}</td>
                                <td>
                                    @if ($cashout->status=='pending')
                                        <a class="btn btn-success" href="{{route('admin.cashout',[$cashout->id,'approved'])}}">Approve</a>
                                        <a class="btn btn-warning" href="{{route('admin.cashout',[$cashout->id,'decline'])}}">Decline</a>
                                    @else
                                        <p>{{$cashout->status}}</p>
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
