<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        "color_price",
        'timestamp_from_birthday'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
