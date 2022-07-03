<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;

class SellerTag extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'status',
    ];

}
