@extends('layouts.master')
@section('title','-Login')

@section('content')

    <div id="social" class="content-block">

        <div class="main-content" style="margin-top: 10px; padding: 5px;">

            <div class="widget-main-title">Upload Photo</div>
            <div class="widget-content login-page">
                @include('error.errors')
                @if(session('imageError'))
                    <p class="alert alert-danger">{{session('imageError')}}</p>
                @endif
                @if(session('imageSuccess'))
                    <p class="alert alert-success">{{session('imageSuccess')}}</p>
                @endif

                <form class="form-group" method="POST" action="{{route('user.upload')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="widget-title">Photo Information</div>
                    <div>
                        <table width="100%" class="widget-tbl">
                            <tr>
                                <td width="150" height="40"><div align="right">Enter Photo's Caption:</div></td>
                                <td><input type="text" name="photocaption" id="photocaption" size=48 tabindex="1" /></td>
                                <td width="150" ><div align="right">Select a Photo:</div></td>
                                <td><input type="file" name="image"  tabindex="2" /></td>
                            </tr>
                            <tr>
                                <td width="150" height="40"><div align="right">Enter Photo's Description:</div></td>
                                <td><textarea rows="4" cols="50" name="description" tabindex="4"  ></textarea></td>
                                <td width="150" ><div align="right"></div></td>
                                <td><input class="btn btn-danger input-focus" type="submit" name="login" value="Upload" /></td>
                            </tr>

                        </table>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
