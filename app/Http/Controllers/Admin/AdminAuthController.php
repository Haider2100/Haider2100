<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cashout;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');

    }

    public function Login()
    {
        $this->validate(\request(),[
            'username'=>'required',
            'password'=>'required'
        ]);
        if (Auth::guard('admin')->attempt([
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

            $photos = Photo::select('status', \DB::raw("COUNT('id') as count"))
                    ->groupBy('status')
                    ->get();

            return redirect()->route('admin.dashboard',compact('photos'));
        }
        else
        {
            return redirect()->back()->with('LoginError','User Name or Password Does not match.....');
        }

    }

    public function LogOut()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');

    }

    public function dashboard()
    {
        $photos = Photo::select('status', \DB::raw("COUNT('id') as count"))
            ->groupBy('status')
            ->get();

        return view('admin.dashboard',compact('photos'));

    }
}
