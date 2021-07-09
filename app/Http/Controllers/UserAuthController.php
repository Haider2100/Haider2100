<?php

namespace App\Http\Controllers;

use App\Models\Cashout;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    Public $userCount, $photoCount,$cashoutSum;
    public function __construct()
    {
        $userCount=User::all()->count();
        $photoCount=Photo::all()->count();
        $cashoutSum=Cashout::where('status','approved')->sum('amount');

        session(['userCount' => $userCount]);
        session(['photoCount' => $photoCount]);
        session(['cashoutSum' => $cashoutSum]);

    }

    public function setSessionVar()
    {
        $userCount=User::all()->count();
        $photoCount=Photo::all()->count();
        $cashoutSum=Cashout::where('status','approved')->sum('amount');

        session(['userCount' => $userCount]);
        session(['photoCount' => $photoCount]);
        session(['cashoutSum' => $cashoutSum]);
        return true;
    }


    public function welcome()
    {

        $photoSlides=Photo::where('status','buy-out')->get();
        return view('welcome',compact('photoSlides'));

    }



    public function showLogin()
    {
        return view('user.login');

    }

    public function Login()
    {
    $this->validate(\request(),[
        'username'=>'required',
        'password'=>'required'
    ]);
    if (Auth::attempt([
        'username'=>\request('username'),
        'password'=>\request('password')

    ]))
    {
        $userCount=User::all()->count();
        $photoCount=Photo::all()->count();
        $cashoutSum=Cashout::where('status','approved')->sum('amount');

        session(['userCount' => $userCount]);
        session(['photoCount' => $photoCount]);
        session(['cashoutSum' => $cashoutSum]);

        return redirect()->route('user.home');
    }
    else
    {
        return redirect()->back()->with('LoginError','User Name or Password Does not match.....');
    }

    }

    public function LogOut()
    {
        Auth::logout();
        return redirect('/login');

    }
}
