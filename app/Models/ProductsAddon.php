<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class ProductsAddon extends Model {

    protected $fillable = [
        'product_id',
        'related_product_id',
        'addon_product_status',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

}
