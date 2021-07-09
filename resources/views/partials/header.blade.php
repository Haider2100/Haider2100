

<div id="top" class="navbar navbar-dark navbar-fixed-top" role="navigation">
    <div class="header-top">
        <div class="container">
            <a href="./">
                <div class="logo fl-l"></div>

            </a>
            <div class="middle-statistics">
                Total Members: <font style="padding-left: 3px; padding-right: 3px; color: #880120;"> {{ session('userCount')}}</font>
                Total Upload Photo: <font style="padding-left: 3px; padding-right: 3px; color: #880120;"> {{ session('photoCount')}}</font>
                Total Paid: <font style="padding-left: 3px; padding-right: 3px; color: #880120;"> Tk.{{session('cashoutSum')}}</font>
            </div>

        </div>
    </div>


    <div class="navigation" style="min-width:1000px;">
        <div class="container">
            <div class="center_wrap1"><div class="center_wrap2">
                    <ul class="nav nav-pills" style="margin-left: 2px;">
                        @if (Auth::check())
                        <li><a style="border-left: 0px;" href="{{route('user.home')}}">Home</a></li>
                        <li><a href="{{route('user.upload.show')}}">Upload</a></li>
                        <li><a href="{{route('user.gallery.show',['all'])}}">Gallery</a></li>
                        <li><a href="{{route('user.financial.show',['all'])}}">Financials</a></li>
                        <li><a href="{{route('user.profile.show')}}">Profile</a></li>
                        <li><a href="{{route('user.msg.show')}}">Message</a></li>
                        <li><a href="{{route('user.logout')}}">Logout ({{Auth::user()->username}})</a></li>

                        @elseif(Auth::guard('admin')->check())
                            <li><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li><a href="{{Route('admin.approve.show')}}">Approve</a></li>
                            <li><a href="{{Route('admin.sellingPhotos')}}">Buyout</a></li>
                            <li><a href="{{route('admin.gallery.show',['all'])}}">Gallery</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                                   Cashout
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" >
                                    <li><a href="{{Route('admin.cashout.show')}}">Pending Cashout</a></li>
                                    <li><a href="{{Route('admin.cashout.summary')}}">User Summary</a></li>
                                    <li><a href="{{Route('admin.cashout.history')}}">Cashout History</a></li>
                                </ul>
                            </li>
                             <li><a href="{{route('admin.logout')}}">Logout ({{Auth::guard('admin')->user()->username}})</a></li>
                        @else
                            <li><a href="{{route('user.login.show')}}">Login</a></li>
                            <li><a href="{{route('user.register.show')}}">Register</a></li>
                        @endif
                    </ul>
                </div></div>
            <div class="clear"></div>
        </div>
    </div>
</div>

</div>
