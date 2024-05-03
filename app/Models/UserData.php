<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'favorit_color',
        'date_birthday',
        'num'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
