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
                <a href="{{route('user.financial.show',['all'])}}" class="btn btn-o btn-lg pull-right">View All</a>
                <a href="{{route('user.financial.show',['decline'])}}" class="btn btn-o btn-lg pull-right">Decline</a>
                <a href="{{route('user.financial.show',['pending'])}}" class="btn btn-o btn-lg pull-right">Pending</a>
                <a href="{{route('user.financial.show',['approved'])}}" class="btn btn-o btn-lg pull-right">Payout</a>
                <h1>USERS FINANCIAL </h1>
                <h3>Current Balance : <b>{{$financials->balance}}</b>
                @if ($financials->balance>=10)
                    <a href="{{ route('user.cashout') }}">CASHOUT</a>
                @endif
                </h3>
                <h4>
                @foreach($cashouts as $cashout)

                        @if ($cashout->status=='pending')
                            Pending : <b>{{$cashout->amount}}</b>
                        @elseif ($cashout->status=='approved')
                            Cashout : <b>{{$cashout->amount}}</b>
                        @endif
                @endforeach
                </h4>


            </header>
            <section class="block-body">
                <div class="container">
                    <h3>CASH OUT HISTORY </h3>
                    <table style="width:100%;" border="1px">
                        <thead>
                        <th>ID </th>
                        <th>AMOUNT </th>
                        <th>DATE </th>
                        <th>STATUS </th>
                        </thead>
                            @foreach($cashouts as $cashout)
                            <tr>
                                <td>{{$cashout->id}} </td>
                                <td>{{$cashout->amount}}</td>
                                <td>{{\Carbon\Carbon::parse($cashout->created_at)->format('Y-m-d')}}</td>
                                <td>{{$cashout->status}}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </section>
        </div><!--/container-->
    </div><!-- /.content-block content-blog-gray -->



@endsection


