<?php

namespace App\Observers;

use App\Mail\UserInvoiceCreated;
use App\Models\UserData;
use App\Models\UserInvoices;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InvoicesObserve
{

    /**
     * Handle the UserInvoices "created" event.
     */
    public function created(UserInvoices $userInvoices){
        $user = Auth::user();
        $num = UserData::where('user_id', $user->id)->count();
        $color_price = UserData::where('favorit_color', request()->favorite_color)->count();
        $data = UserInvoices::where('user_id', $user->id)->first();
        $date = Carbon::createFromTimestamp($data->timestamp_from_birthday);


        Mail::to($user->email)->send(new UserInvoiceCreated($num, $color_price, $date));
    }

    /**
     * Handle the UserInvoices "updated" event.
     */
    public function updated(UserInvoices $userInvoices): void
    {
        //
    }

    /**
     * Handle the UserInvoices "deleted" event.
     */
    public function deleted(UserInvoices $userInvoices): void
    {
        //
    }

    /**
     * Handle the UserInvoices "restored" event.
     */
    public function restored(UserInvoices $userInvoices): void
    {
        //
    }

    /**
     * Handle the UserInvoices "force deleted" event.
     */
    public function forceDeleted(UserInvoices $userInvoices): void
    {
        //
    }
}
