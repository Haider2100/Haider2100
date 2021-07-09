@extends('layouts.master')
@section('title','-Register')


@section('content')

    <div id="social" class="content-block">

    <div class="main-content" style="margin-top: 10px; padding: 5px;">

    <div class="widget-main-title">Registration</div>
    <div class="widget-content login-page">

        @include('error.errors')
        @if(session('registrationError'))
            <p class="alert alert-danger">{{session('registrationError')}}</p>
        @endif

        <form class="form-group" method="POST" action="{{route('user.register')}}">
            {{csrf_field()}}
            <div class="widget-title">General Information</div>
            <div>
                <table width="100%" class="widget-tbl">
                    <tr>
                        <td width="150" height="40"><div align="right">Full Name:</div></td>
                        <td><input type="text" name="fullname" id="fullname" tabindex="1" /></td>
                        <td width="150" ><div align="right">Username:</div></td>
                        <td><input type="text" name="username" id="username" tabindex="4" /></td>
                    </tr>
                    <tr>
                        <td width="150" height="40"><div align="right">E-mail Address:</div></td>
                        <td><input type="text" name="email" id="remail" tabindex="2" /></td>
                        <td width="150" ><div align="right"><span id="result"></span> Password:</div></td>
                        <td><input type="password" name="password" id="password" tabindex="5" /></td>
                    </tr>

                      <tr>
                        <td width="150" height="40"><div align="right">Confirm E-mail Address:</div></td>
                        <td><input type="text" name="email_confirmation" id="remail2" tabindex="3" /></td>
                        <td width="150"><div align="right">Confirm Password:</div></td>
                        <td><input type="password" name="password_confirmation" id="password2" tabindex="6" /></td>
                    </tr>
                </table>
            </div>
            <div style="display:table; width:100%">
                <div style="display:table-cell; width:45%; padding-right:15px">
                    <div class="widget-title">Payment Account</div>
                    <div>
                        <table width="100%" class="widget-tbl">
                            <tr>
                                <td width="150" height="40"><div align="right">Paypal:</div></td>
                                <td><input type="text" name="gatewayid[7]" placeholder="<-Optional->" id="gateway[7]" /></td>
                            </tr>
                            <tr>
                                <td width="150" height="40"><div align="right">Payoneer:</div></td>
                                <td><input type="text" name="gatewayid[20]" placeholder="<-Optional->" id="gateway[20]" /></td>
                            </tr>
                            <tr>
                                <td width="150" height="40"><div align="right">Bitcoin:</div></td>
                                <td><input type="text" name="gatewayid[12]" placeholder="<-Optional->" id="gateway[12]" /></td>
                            </tr>
                            <tr>
                                <td width="150" height="40"><div align="right">FaucetPay:</div></td>
                                <td><input type="text" name="gatewayid[61]" placeholder="<-Optional->" id="gateway[61]" /></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div style="display:table-cell">


                    <div class="widget-title">Terms of Service</div>
                    <div>
                        <label><input type="checkbox" name="terms" /> I have read, and agree to abide by the <a href="index.php">Starwave-Photographer-Clicks rules</a>.</label><br />
                        <input class="btn btn-danger input-focus" type="submit" name="login" value="Register" />
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>


@endsection
