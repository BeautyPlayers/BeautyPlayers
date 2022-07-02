<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;

class SellerLevel extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'commission',
        'status',
        'is_default',
    ];

}
