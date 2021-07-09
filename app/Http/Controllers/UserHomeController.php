<?php

namespace App\Http\Controllers;

use App\Models\Cashout;
use App\Models\Photo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHomeController extends Controller
{
   // public function home()
   // {
  //      return view('user.home');
   // }

    public function showUpload()
    {
        return view('user.uploadphoto');
    }
//UPLOAD SELLING PHOTOS
    public function upload(Request $request)
    {
        $this->validate($request,[
        'image'=>'required|image|mimes:jpg,png,bmp|max:2000'
        ]);
        if ($request->hasFile('image')){
            $imageName=uniqid().'.jpg';
            $request->image->move('photos',$imageName);

           Photo::create([
               'user_id'=>Auth::id(),
               'photocaption'=>$request->photocaption,
               'description'=>$request->description,
               'imagename'=>$imageName
           ]);
//====================Update Session Variabble===========================
            $userCount=User::all()->count();
            $photoCount=Photo::all()->count();
            $cashoutSum=Cashout::where('status','approved')->sum('amount');

            session(['userCount' => $userCount]);
            session(['photoCount' => $photoCount]);
            session(['cashoutSum' => $cashoutSum]);
//====================================================
            return redirect()->back()->with('imageSuccess','Successfully Upload');
        }else
        {
            return redirect()->back()->with('imageError','Something is wrong');

        }

    }

    public function showGallery($status)
    {
        if ($status=='all'){
            $photos=Photo::where('user_id',Auth::id())->get();
        }else{
            $photos=Photo::where('user_id',Auth::id())->where('status',$status)->get();
        }


        return view('user.gallery',compact(['photos']));
    }

    public function sellRequest($imageId)
    {
        $photo=Photo::findorfail($imageId);
        if ($photo->status=='approved') {
            $photo->Update([
                'status' => 'Selling',
                //'approved_by'=> $status=='approved'? Auth::guard('admin')->user()->id:null,
                //'approved_by'=> Auth::guard('admin')->user()->id,
                'approved_date' => date('Y-m-d'),
            ]);
            return redirect()->back();
        }else{
            return "System Error";
        }
    }
    public  function showFinancial($status)
    {
        $user = User::findorfail(Auth::id());
        $financials = $user->financial;
        if ($status=='all') {
            $cashouts = $user->cashout;
        }else{
            $cashouts = $user->cashout->where('status',$status);
        }

        return view('user.financial',compact(['financials','cashouts']));

    }
    public function cashout()
    {
        $user=User::findorfail(Auth::id());
        $balance=$user->financial->balance;
        if($balance>=10){
            $user->cashout()->create([
             'amount'=>$balance
            ]);
            $user->financial()->update([
                'balance'=>0.0
            ]);

                return redirect()->back();

        }else{
            return 'Balance under cash out limit';
        }


    }

    public function showProfile()
    {
        $users=User::findorfail(Auth::id());
        $profiles = $users->profile;
        return view('user.profile',compact(['users','profiles']));
    }

    public function saveProfile()
    {
       // $profiles=profile::findorfail(Auth::id());

        $user = User::findOrfail(Auth::id());
        $user->profile()->update([
            'full_name' => \request('full_name'),
            'address' => \request('address'),
            'phone' => \request('phone'),
            'home_district' => \request('district'),
            'age' => \request('age'),
            'occupation' => \request('occupation'),
            'National_id' => \request('nid'),
            'tax_id' => \request('tin'),
            'updated_at' =>Carbon::now(),//date('Y-m-d H:i:s'),
              ]);

        return redirect()->back()->with('profileSuccess','Successfully Save');
    }

    public function showMsg()
    {
        $users=User::findorfail(Auth::id());
        $profiles = $users->profile;
        return view('user.message',compact(['users','profiles']));
    }

    public function pieChart()
    {
        //$photos = Photo::withCount('status')->where('user_id',Auth::id())->get();
        $photos = Photo::select('status', \DB::raw("COUNT('id') as count"))
            ->where('user_id',Auth::id())
            ->groupBy('status')
            ->get();

        return view('user.home', compact('photos'));
    }
}
