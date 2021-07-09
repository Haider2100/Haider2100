<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\Emailvarify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserRegisterController extends Controller
{
   public function showRegister()
   {
    return view('user.register');
   }
    public function register()
    {
        $this->validate(request(),[
            'fullname'=>'required',
            'username'=>'required|unique:users,username|alpha_dash',
            'email'=>'required|email|unique:users,email',
            'email_confirmation'=>'required|same:email',
            'password'=>'required|min:4',
            'password_confirmation'=>'required|same:password',
            'terms'=>'required'
        ]);

        $user=User::create([
            'username'=>request('username'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password')),
        ]);
        //$user->profile()->Create();
        $user->profile()->Create([
            'full_name'=>request('fullname')
        ]);
        $user->financial()->Create();

        $token=Str::random(30);
        $user->emailVarify()->Create(['token'=>$token]);
        //$link="www.example.com/".$user->email.'/'.$token;

        $link=route('user.emailVerify',[$user->email,$token]);

        Mail::to($user->email)->send(new RegisterMail($link));

        return redirect(route('user.login.show'));
    }

    public function verifyEmail($email,$token)
    {
       $user=User::where('email',$email)->first();
       $userCount=User::where('email',$email)->count();

       $emailVerify=Emailvarify::where('token',$token)->first();
       $tokenCount=Emailvarify::where('token',$token)->count();

       if ($user!=null && $userCount==1 && $emailVerify!=null && $tokenCount==1){
            $user->update([
                'email_verified'=>'1'
            ]);
            $user->emailVarify()->delete();
            return redirect('/');
       }else{
           return '!! Something went wrong !!';
       }
    }
}
