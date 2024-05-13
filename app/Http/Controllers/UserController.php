<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use App\Models\UserInvoices;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(Request $request){
        $user = Auth::user();
        $colorCount =  UserData::where('favorit_color', $request->favorite_color)->count()+1;
        $num = UserData::where('user_id', $user->id)->count()+1;
 

        $data_birthday = $request->date_birthday;
        $data_registration = $user->created_at;

        $difference = $data_registration->diffInSeconds($data_birthday);
        $timestamp = Carbon::createFromTimestamp(0)->addSeconds($difference);

        // $timeDiff = strtotime($user->created_at)-strtotime($request->date_birthday);
        // $timestamp = Carbon::createFromTimestamp($timeDiff);
        DB::transaction(function() use($user,$colorCount, $num,$timestamp, $request){
            
            UserData::create([
                "user_id"=>$user->id,
                'favorit_color'=>$request->favorite_color,
                'date_birthday'=>$request->date_birthday,
                "num"=>$num,
            ]);
            UserInvoices::create([
                "user_id"=>$user->id,
                "color_price"=>$colorCount,
                'timestamp_from_birthday'=>$timestamp
            ]);

        });

        return redirect("/users");
    }
}
