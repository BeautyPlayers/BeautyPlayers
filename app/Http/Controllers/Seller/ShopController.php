<?php

namespace App\Http\Controllers\Seller;

use App\Models\BusinessSetting;	
use App\Models\Product;	
use App\Models\SellerAward;	
use App\Models\SellerEducation;	
use App\Models\SellerExperience;	
use App\Models\SellerMembership;	
use App\Models\SellerRegistration;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\SellerLevel;
use App\Models\SellerTag;	
use App\Models\Upload;
use Auth;	
use Storage;	
use Image;

class ShopController extends Controller
{
    public function index()
    {
//        $shop = Auth::user()->shop;
//        $seller_levels = SellerLevel::where('status',1)->get();
//        $seller_tags = SellerTag::where('status',1)->get();
//        return view('seller.shop', compact('shop','seller_levels','seller_tags'));
        
        $data['shop'] = Auth::user()->shop;	
        $data['products'] = Product::select('id', 'name')->get();	
        $data['edus'] = SellerEducation::where('user_id', Auth::id())->get();	
        $data['exps'] = SellerExperience::where('user_id', Auth::id())->get();	
        $data['awards'] = SellerAward::where('user_id', Auth::id())->get();	
        $data['memberships'] = SellerMembership::where('user_id', Auth::id())->get();	
        $data['regs'] = SellerRegistration::where('user_id', Auth::id())->get();	
        $data['seller_levels'] = SellerLevel::where('status',1)->get();;
        $data['seller_tags'] = SellerTag::where('status',1)->get();
        return view('seller.shop', $data);
    }	
    public function updateShop(Request $request)	
    {	
//        return $request->all();	
        $this->addEducation($request);	
        $this->addExperience($request);	
        $this->addAward($request);	
        $this->addMembership($request);	
        $this->addRegistration($request);	
//        return $request->service_id;	
//        $services = [];	
//        foreach($request->service_id as $service) {	
//            $services[] = array_push($services,$service);	
//        }	
        $shop = Shop::whereId($request->shop_id)->first();	
        $shop->about_me = is_null($request->about_me) ? null : $request->about_me;	
        $shop->logo = is_null($request->logo) ? $shop->logo : $this->uploads($request->file('logo'));	
        $shop->name = is_null($request->name) ? $shop->name : $request->name;	
        $shop->address = is_null($request->address) ? $shop->address : $request->address;	
        $shop->delivery_pickup_longitude = is_null($request->delivery_pickup_longitude) ? $shop->delivery_pickup_longitude : $request->delivery_pickup_longitude;	
        $shop->delivery_pickup_latitude = is_null($request->delivery_pickup_latitude) ? $shop->delivery_pickup_latitude : $request->delivery_pickup_latitude;	
        $shop->specialization = is_null($request->specialist) ? null : $request->specialist;	
        $shop->sliders = is_null($request->banner) ? $shop->silders : $this->uploads($request->file('banner'));	
        $shop->facebook = is_null($request->facebook) ? $shop->facebook : $request->facebook;	
        $shop->instagram = is_null($request->instagram) ? $shop->instagram : $request->instagram;	
        $shop->google = is_null($request->google) ? $shop->google : $request->google;	
        $shop->twitter = is_null($request->twitter) ? $shop->twitter : $request->twitter;	
        $shop->youtube = is_null($request->youtube) ? $shop->youtube : $request->youtube;	
        $shop->service_id = json_encode($request->service_id);	
        $shop->meta_title = $request->meta_title;
        $shop->meta_description = $request->meta_description;
        $shop->seller_level_id = $request->seller_level_id;
        $shop->seller_tag_id = $request->seller_tag_id;
        if ($shop->save()) {	
            flash(translate('Your Shop has been updated successfully!'))->success();	
            return back();	
        }	
        flash(translate('Sorry! Something went wrong.'))->error();	
        return back();	
    }	
    public function uploads($data){	
        $type = array(	
            "jpg"=>"image",	
            "jpeg"=>"image",	
            "png"=>"image",	
            "svg"=>"image",	
            "webp"=>"image",	
            "gif"=>"image",	
            "mp4"=>"video",	
            "mpg"=>"video",	
            "mpeg"=>"video",	
            "webm"=>"video",	
            "ogg"=>"video",	
            "avi"=>"video",	
            "mov"=>"video",	
            "flv"=>"video",	
            "swf"=>"video",	
            "mkv"=>"video",	
            "wmv"=>"video",	
            "wma"=>"audio",	
            "aac"=>"audio",	
            "wav"=>"audio",	
            "mp3"=>"audio",	
            "zip"=>"archive",	
            "rar"=>"archive",	
            "7z"=>"archive",	
            "doc"=>"document",	
            "txt"=>"document",	
            "docx"=>"document",	
            "pdf"=>"document",	
            "csv"=>"document",	
            "xml"=>"document",	
            "ods"=>"document",	
            "xlr"=>"document",	
            "xls"=>"document",	
            "xlsx"=>"document"	
        );	
        $upload = new Upload;	
        $extension = strtolower($data->getClientOriginalExtension());	
        if(isset($type[$extension])){	
            $upload->file_original_name = null;	
            $arr = explode('.', $data->getClientOriginalName());	
            for($i=0; $i < count($arr)-1; $i++){	
                if($i == 0){	
                    $upload->file_original_name .= $arr[$i];	
                }	
                else{	
                    $upload->file_original_name .= ".".$arr[$i];	
                }	
            }	
            $path = $data->store('uploads/all', 'local');	
            $size = $data->getSize();	
            // Return MIME type ala mimetype extension	
            $finfo = finfo_open(FILEINFO_MIME_TYPE);	
            // Get the MIME type of the file	
            $file_mime = finfo_file($finfo, base_path('public/').$path);	
            if($type[$extension] == 'image' && get_setting('disable_image_optimization') != 1){	
                try {	
                    $img = Image::make($data->getRealPath())->encode();	
                    $height = $img->height();	
                    $width = $img->width();	
                    if($width > $height && $width > 1500){	
                        $img->resize(1500, null, function ($constraint) {	
                            $constraint->aspectRatio();	
                        });	
                    }elseif ($height > 1500) {	
                        $img->resize(null, 800, function ($constraint) {	
                            $constraint->aspectRatio();	
                        });	
                    }	
                    $img->save(base_path('public/').$path);	
                    clearstatcache();	
                    $size = $img->filesize();	
                } catch (\Exception $e) {	
                    //dd($e);	
                }	
            }	
            if (env('FILESYSTEM_DRIVER') == 's3') {	
                Storage::disk('s3')->put(	
                    $path,	
                    file_get_contents(base_path('public/').$path),	
                    [	
                        'visibility' => 'public',	
                        'ContentType' =>  $extension == 'svg' ? 'image/svg+xml' : $file_mime	
                    ]	
                );	
                if($arr[0] != 'updates') {	
                    unlink(base_path('public/').$path);	
                }	
            }	
            $upload->extension = $extension;	
            $upload->file_name = $path;	
            $upload->user_id = Auth::user()->id;	
            $upload->type = $type[$upload->extension];	
            $upload->file_size = $size;	
            $upload->save();	
        }	
        return $upload->id;	
    }	
    public function addEducation($data)	
    {	
        $user_id = $data->user_id;	
        SellerEducation::where('user_id', $data->user_id)->delete();	
        foreach ($data->education as $key => $value) {	
            SellerEducation::create([	
                'user_id' => $user_id,	
                'degree' => $value['degree'],	
                'college' => $value['college'],	
                'year' => $value['year'],	
                'photo' => empty($value['photo']) ? $value['prev_photo'] : $this->uploads($value['photo'])	
            ]);	
        }	
    }	
    public function addExperience($data)	
    {	
        $user_id = $data->user_id;	
        SellerExperience::where('user_id', $data->user_id)->delete();	
        foreach ($data->experience as $key => $value) {	
            SellerExperience::create([	
                'user_id' => $user_id,	
                'name' => $value['name'],	
                'from' => $value['from'],	
                'to' => $value['to'],	
                'designation' => $value['designation'],	
                'photo' => empty($value['photo']) ? $value['prev_photo'] : $this->uploads($value['photo'])	
            ]);	
        }	
    }	
    public function addAward($data)	
    {	
        $user_id = $data->user_id;	
        SellerAward::where('user_id', $data->user_id)->delete();	
        foreach ($data->awards as $key => $value) {	
            SellerAward::create([	
                'user_id' => $user_id,	
                'award' => $value['award'],	
                'year' => $value['year'],	
            ]);	
        }	
    }	
    public function addMembership($data)	
    {	
        $user_id = $data->user_id;	
        SellerMembership::where('user_id', $data->user_id)->delete();	
        foreach ($data->memberships as $key => $value) {	
            SellerMembership::create([	
                'user_id' => $user_id,	
                'membership' => $value['membership'],	
            ]);	
        }	
    }	
    public function addRegistration($data)	
    {	
        $user_id = $data->user_id;	
        SellerRegistration::where('user_id', $data->user_id)->delete();	
        foreach ($data->regs as $key => $value) {	
            SellerRegistration::create([	
                'user_id' => $user_id,	
                'registration' => $value['registration'],	
                'year' => $value['year'],	
                'photo' => empty($value['photo']) ? $value['prev_photo'] : $this->uploads($value['photo'])	
            ]);	
        }	
    }

    public function update(Request $request)
    {
        $shop = Shop::find($request->shop_id);

        if ($request->has('name') && $request->has('address')) {
            if ($request->has('shipping_cost')) {
                $shop->shipping_cost = $request->shipping_cost;
            }

            $shop->name             = $request->name;
            $shop->address          = $request->address;
            $shop->phone            = $request->phone;
            $shop->slug             = preg_replace('/\s+/', '-', $request->name) . '-' . $shop->id;
            $shop->meta_title       = $request->meta_title;
            $shop->meta_description = $request->meta_description;
            $shop->seller_level_id  = $request->seller_level_id;
            $shop->seller_tag_id  = $request->seller_tag_id;
            $shop->logo             = $request->logo;
        }

        if ($request->has('delivery_pickup_longitude') && $request->has('delivery_pickup_latitude')) {

            $shop->delivery_pickup_longitude    = $request->delivery_pickup_longitude;
            $shop->delivery_pickup_latitude     = $request->delivery_pickup_latitude;
        } elseif (
            $request->has('facebook') ||
            $request->has('google') ||
            $request->has('twitter') ||
            $request->has('youtube') ||
            $request->has('instagram')
        ) {
            $shop->facebook = $request->facebook;
            $shop->instagram = $request->instagram;
            $shop->google = $request->google;
            $shop->twitter = $request->twitter;
            $shop->youtube = $request->youtube;
        } else {
            $shop->sliders = $request->sliders;
        }

        if ($shop->save()) {
            flash(translate('Your Shop has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function verify_form ()
    {
        if (Auth::user()->verification_info == null) {
            $shop = Auth::user()->shop;
            return view('seller.verify_form', compact('shop'));
        } else {
            flash(translate('Sorry! You have sent verification request already.'))->error();
            return back();
        }
    }

    public function verify_form_store(Request $request)
    {
        $data = array();
        $i = 0;
        foreach (json_decode(BusinessSetting::where('type', 'verification_form')->first()->value) as $key => $element) {
            $item = array();
            if ($element->type == 'text') {
                $item['type'] = 'text';
                $item['label'] = $element->label;
                $item['value'] = $request['element_' . $i];
            } elseif ($element->type == 'select' || $element->type == 'radio') {
                $item['type'] = 'select';
                $item['label'] = $element->label;
                $item['value'] = $request['element_' . $i];
            } elseif ($element->type == 'multi_select') {
                $item['type'] = 'multi_select';
                $item['label'] = $element->label;
                $item['value'] = json_encode($request['element_' . $i]);
            } elseif ($element->type == 'file') {
                $item['type'] = 'file';
                $item['label'] = $element->label;
                $item['value'] = $request['element_' . $i]->store('uploads/verification_form');
            }
            array_push($data, $item);
            $i++;
        }
        $shop = Auth::user()->shop;
        $shop->verification_info = json_encode($data);
        if ($shop->save()) {
            flash(translate('Your shop verification request has been submitted successfully!'))->success();
            return redirect()->route('seller.dashboard');
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function show()
    {
    }
}
