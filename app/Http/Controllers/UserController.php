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
        // $dataRegistration = User::get('created_at',)->where('user_id', $user->id);
 
        $timeDiff =  strtotime($request->date_birthday) - strtotime($user->created_at);
        DB::transaction(function() use($user,$colorCount, $num,$timeDiff, $request){
            
            UserData::create([
                "user_id"=>$user->id,
                'favorit_color'=>$request->favorite_color,
                'date_birthday'=>$request->date_birthday,
                "num"=>$num,
            ]);
            UserInvoices::create([
                "user_id"=>$user->id,
                "color_price"=>$colorCount,
                'timestamp_from_birthday'=>abs($timeDiff)
            ]);

        });

        return redirect("/users");
    }
}
