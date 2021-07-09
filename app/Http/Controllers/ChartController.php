<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function donutChart1()
    {
        //$photos = Photo::withCount('status')->where('user_id',Auth::id())->get();
        $photos = Photo::select('status', \DB::raw("COUNT('id') as count"))
            ->groupBy('status')
            ->get();

        return view('user.donutChart', compact('photos'));
    }
}
