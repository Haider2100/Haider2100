@extends('layouts.master')
@section('title','-Login')
@section('content')
    <style>
        table.center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <div id="social" class="content-block">

        <div class="main-content" style="margin-top: 10px; padding: 5px;">
            <div class="widget-main-title" >Message Board</div>
            <div class="widget-content login-page">
                @include('error.errors')
                @if(session('LoginError'))
                    <p class="alert alert-danger">{{session('LoginError')}}</p>
                @endif
                <form class="form-group" method="POST" action="{{route('user.login')}}">
                    {{csrf_field()}}
                   <h1>COOMING SOON</h1>
                    <table  class="center" width="300px" >
                        <tr>

                        </tr>

                        <tr>

                        </tr>

                        <tr>

                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>


    </div>


@endsection

