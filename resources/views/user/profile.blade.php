@extends('layouts.master')
@section('title','-Register')


@section('content')


    <div id="social" class="content-block">

        <div class="main-content" style="margin-top: 10px; padding: 5px;">

            <div class="widget-main-title">User Profile</div>
            <div class="widget-content login-page">

                @include('error.errors')
                @if(session('profileSuccess'))
                    <p class="alert alert-success">{{session('profileSuccess')}}</p>
                @endif
                @if(session('profileError'))
                    <p class="alert alert-danger">{{session('profileError')}}</p>
                @endif

                <form class="form-group" method="POST" action="{{route('user.profile')}}">
                    {{csrf_field()}}
                    <div class="widget-title">Account Information</div>
                    <div>


                        <table width="100%" class="widget-tbl">
                            <tr>
                                <td  rowspan="3"><div align="center" ><img src="img/slide1.jpg" width="150px" height="100px"; ></div></td>
                                <td  height="30"><div align="left" >User Name:</div></td>
                                <td  height="30"><input type="text" name="username"  id="username" value="{{$users->username}}" tabindex="1"> <a href="" >Change</a></td>
                                <td><div align="left">Status</div></td>
                                @if($users->email_verified==0)
                                <td><label >{{$users->status.'/ Need email Verify'}}</label>
                                    <a href="" >Varify</a>
                                    @else
                                    <td> <label >{{$users->status.'/ Verified'}} </label>
                                    @endif
                                </td>

                            </tr>
                            <tr>
                                <td width="150" height="40"><div align="left">Password:</div></td>
                                <td><input type="text" name="password" id="password" value="********" tabindex="2" /> <a href="" >Change</a></td>
                                <td width="150" ><div align="left"><span id="result"></span> Created at:</div></td>
                                <td><label>{{$users->created_at}}</label></td>
                            </tr>

                            <tr>
                                <td width="150" height="40"><div align="left">E-mail Address:</div></td>
                                <td><input type="text" name="email" id="email" value="{{$users->email}}" tabindex="3" /> <a href="" >Change</a></td>
                                <td ><div align="right"></div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="" >Change</a></td>
                                <td colspan="3"></td>
                            </tr>
                        </table>

                    </div>

                    <div class="widget-title">Personal Information</div>
                    <div>
                        <table width="100%" class="widget-tbl">
                            <tr>
                                <td  height="40"><div align="left" >Full Name:</div></td>
                                <td colspan="2" height="40"><input type="text" name="full_name"  id="fullname" size="50" value="{{$profiles->full_name}}" tabindex="1"> </td>
                                <td><div align="left">Age:</div></td>
                                <td><input type="text" name="age" id="age" value="{{$profiles->age}}" tabindex="4" /></td>
                            </tr>
                            <tr>
                                <td rowspan="2" width="150" ><div align="left">Address:</div></td>
                                <td rowspan="2" colspan="2"><textarea rows="4" cols="52" name="address" placeholder="{{$profiles->address}}" tabindex="4"  ></textarea></td>
                                <td width="150" ><div align="left"><span id="result"></span>Occupation:</div></td>
                                <td><input type="text" name="occupation" id="occupation" value="{{$profiles->Occupation}}" tabindex="5" /></td>
                            </tr>

                            <tr>

                                <td width="150" height="40"><div align="left">National ID:</div></td>
                                <td><input type="text" name="nid" id="nid" value="{{$profiles->National_id}}" tabindex="3" /></td>
                            </tr>
                            <tr>
                                <td width="150" height="40"><div align="left">Phone Number:</div></td>
                                <td><input type="text" name="phone" id="phone" size="30" value="{{$profiles->phone}}" tabindex="3" /></td>
                                <td rowspan="2" align="center" ><input class="btn btn-danger input-focus" type="submit" name="save" value="Save" /></td>
                                <td width="150" height="40"><div align="left">Tax ID:</div></td>
                                <td><input type="text" name="tin" id="tin" value="{{$profiles->tax_id}}" tabindex="3" /></td>
                            </tr>
                            <tr>
                                <td width="150" height="40"><div align="left">Home District:</div></td>
                                <td><input type="text" name="district" id="district" size="30" value="{{$profiles->home_district}}" tabindex="3" /></td>
                                <td width="150" height="30"><div align="left">Last Update on:</div></td>
                                <td><label>{{$profiles->updated_at}}</label></td>
                            </tr>
                            <tr>
                                 <td colspan="5" height="40" align="center"></td>
                            </tr>
                        </table>
                    </div>


                            <div class="widget-title">Payment Information</div>
                            <div>
                                <table width="100%" class="widget-tbl">
                                    <tr>
                                        <td width="150" height="40"><div align="right">Paypal:</div></td>
                                        <td><input type="text" name="gatewayid[7]" placeholder="<-Optional->" id="gateway[7]" /></td>
                                        <td rowspan="4" align="center"><a href="" class="btn btn-danger input-focus" >Update</a></td>
                                        <td width="150" height="40"><div align="right">Payoneer:</div></td>
                                        <td><input type="text" name="gatewayid[20]" placeholder="<-Optional->" id="gateway[20]" /></td>
                                    </tr>
                                    <tr>
                                        <td width="150" height="40"><div align="right">Bitcoin:</div></td>
                                        <td><input type="text" name="gatewayid[12]" placeholder="<-Optional->" id="gateway[12]" /></td>
                                        <td width="150" height="40"><div align="right">FaucetPay:</div></td>
                                        <td><input type="text" name="gatewayid[61]" placeholder="<-Optional->" id="gateway[61]" /></td>
                                    </tr>


                                </table>
                            </div>

                </form>
            </div>
        </div>
    </div>


@endsection

