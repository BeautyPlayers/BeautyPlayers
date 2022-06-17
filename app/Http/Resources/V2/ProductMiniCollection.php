<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductMiniCollection extends ResourceCollection
{
    public function toArray($request)
    {
       
        return [
            'data' => $this->collection->map(function($data) {
                $commissionArr = [];
                $category_wise_affiliate = \App\Models\AffiliateOption::where('type', 'category_wise_affiliate')->first();
                if ($category_wise_affiliate && !empty($category_wise_affiliate->details)) {
                    $commissionArr = json_decode($category_wise_affiliate->details, true);
                }
                $commission_type = 0;
                $referral_commission = 0;
                if (count($commissionArr)) {                        
                    foreach ($commissionArr as $cKey => $commission) {
                        if ($data->category_id == $commission['category_id'] && $commission['commission'] > 0) {
                            $commission_type = $commission['commission_type'];
                            $referral_commission = $commission['commission'];
                        }
                    }
                }
                
                return [
                    'id' => $data->id,
                    'name' => $data->getTranslation('name'),
                    'thumbnail_image' => uploaded_asset($data->thumbnail_img),
                    'has_discount' => home_base_price($data, false) != home_discounted_base_price($data, false) ,
                    'stroked_price' => home_base_price($data),
                    'main_price' => home_discounted_base_price($data),
                    'rating' => (double) $data->rating,
                    'sales' => (integer) $data->num_of_sale,
                    'description' => $data->description,
                    'earn_point' => $data->earn_point,
                    'unit' => (integer) $data->unit,
                    'category_id' => $data->category_id,
                    'commission_type' => $commission_type,
                    'referral_commission' => $referral_commission,
                    'links' => [
                        'details' => route('products.show', $data->id),
                    ]
                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
