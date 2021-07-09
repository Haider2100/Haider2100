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
            <div class="widget-main-title" >Members Login</div>
            <div class="widget-content login-page">
                @include('error.errors')
                @if(session('LoginError'))
                    <p class="alert alert-danger">{{session('LoginError')}}</p>
                @endif
                <form class="form-group" method="POST" action="{{route('user.login')}}">
                    {{csrf_field()}}
                    <table  class="center" width="300px" >
                        <tr>
                            <td width="150" height="40" align="right">Username: </td>
                            <td><input type="text" name="username" placeholder="User Name" size="25"></td>
                        </tr>

                        <tr>
                            <td width="150" height="40" align="right">Password: </td>
                            <td><input type="password" name="password" placeholder="Password" size="25" /></td>
                        </tr>

                        <tr>
                            <td width="150" height="40"></td>
                            <td><input class="btn btn-danger input-focus" type="submit" style="float: left;" name="login" value="Login" />
                            <div style="float: left; margin-left: 10px;"><a href="#">Forgot your password?</a></div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>


    </div>





@endsection

