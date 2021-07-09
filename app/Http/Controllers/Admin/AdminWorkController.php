<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cashout;
use App\Models\financial;
use App\Models\Photo;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminWorkController extends Controller
{
    public function showPendingImage()
    {
    $photos=Photo::where('status','pending')->get();
    return view('admin.approve',compact('photos'));

    }

    public function approveStatus($imageId,$status)
    {
        $photo=Photo::findorfail($imageId);
        $photo->Update([
            'status'=>$status,
            //'approved_by'=> $status=='approved'? Auth::guard('admin')->user()->id:null,
            'approved_by'=> Auth::guard('admin')->user()->id,
            'approved_date'=> date('Y-m-d'),
        ]);
        return redirect()->back();
    }

    public function showSellingPhotos()
    {
        $photos=Photo::where('status','selling')->get();
        return view('admin.selling',compact('photos'));

    }

    public function showGallery($status)
    {
        if ($status=='all'){
            $photos=Photo::all();
        }else{
            $photos=Photo::where('status',$status)->get();
        }
             return view('admin.gallery',compact('photos'));

    }
    public function showCashoutSummary()
    {
        $cashoutSummarys=Cashout::with('user')->where('status','=','approved')->get();
        return view('admin.cashoutsummary',compact('cashoutSummarys'));

    }

    public function showCashoutHistory()
    {
        $cashoutHistorys=Cashout::with('user')->get();
        return view('admin.cashouthistory',compact('cashoutHistorys'));

    }


    public function buyout()
    {
        $status=\request('status');

        if ($status=='buy-out'){
            $rate=\request('rate');
            $photoId=\request('photo_id');

            if($rate!=null && $rate!=0 && $photoId!=null){

                $photo=Photo::findorfail($photoId);
                DB::transaction(function () use ($photo,$rate) {
                    $photo->Update([
                        'status' => 'buy-out',
                        'buyrate' => $rate,
                        //'approved_by'=> $status=='approved'? Auth::guard('admin')->user()->id:null,
                        'buyout_by' => Auth::guard('admin')->user()->id,
                        'buyout_date' => date('Y-m-d'),
                    ]);
                    $user = User::findOrfail($photo->user_id);
                    $preBalance = $user->financial->balance;
                    $newBalance = $preBalance + $rate;

                    $user->financial()->update([
                        'balance' => $newBalance
                    ]);
                });
                return redirect()->back();

            }else{return 'Something Wrong 1';}

        }else if ($status=='decline')
        {
            $photoId=\request('photo_id');
            $photo=Photo::findorfail($photoId);
            $photo->Update([
                'status'=>'decline',
                //'approved_by'=> $status=='approved'? Auth::guard('admin')->user()->id:null,
                'buyout_by'=> Auth::guard('admin')->user()->id,
                'buyout_date'=> date('Y-m-d'),
            ]);
            return redirect()->back();

        }else{
            return 'Something Wrong 2';
        }

    }

    public function showCashoutRequest()
    {
        $cashoutRequests=Cashout::with('user')->where('status','=','pending')->get();
        //dd($cashoutRequest);
       // dd($cashoutRequest->toArray());
        return view('admin.cashout',compact('cashoutRequests'));
    }

    public function executeCashout($cashoutId,$status)
    {
        $cashout=Cashout::findOrfail($cashoutId);
        DB::transaction(function () use ($cashout,$status) {
            $cashout->update([
                'status' => $status

            ]);
            if ($status == 'decline') {

                $user = User::findOrfail($cashout->user_id);
                $preBalance = $user->financial->balance;
                $newBalance = $preBalance + $cashout->amount;

                $user->financial()->update([
                    'balance' => $newBalance
                ]);

                // return redirect()->back();
            }
        });
        return redirect()->back();
    }
}
