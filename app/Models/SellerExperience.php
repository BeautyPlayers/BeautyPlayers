<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'from',
        'to',
        'designation',
        'photo',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
