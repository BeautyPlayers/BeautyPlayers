<?php



namespace App\Http\Controllers;



use App\Http\Requests\ProductRequest;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\ProductTranslation;

use App\Models\Category;

use App\Models\ProductTax;

use App\Models\AttributeValue;

use App\Models\Cart;

use Carbon\Carbon;

use Combinations;

use CoreComponentRepository;

use Artisan;

use Cache;

use Str;

use App\Services\ProductService;

use App\Services\ProductTaxService;

use App\Services\ProductFlashDealService;

use App\Services\ProductStockService;

use App\Models\ProductsAddon;

use App\Models\ServicePackage;
use App\Models\ServicePackageProduct;



class ProductController extends Controller

{

    protected $productService;

    protected $productTaxService;

    protected $productFlashDealService;

    protected $productStockService;



    public function __construct(

        ProductService $productService,

        ProductTaxService $productTaxService,

        ProductFlashDealService $productFlashDealService,

        ProductStockService $productStockService

    ) {

        $this->productService = $productService;

        $this->productTaxService = $productTaxService;

        $this->productFlashDealService = $productFlashDealService;

        $this->productStockService = $productStockService;

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function admin_products(Request $request)

    {

        CoreComponentRepository::instantiateShopRepository();



        $type = 'In House';

        $col_name = null;

        $query = null;

        $sort_search = null;



        $products = Product::where('added_by', 'admin')->where('auction_product', 0)->where('wholesale_product', 0);



        if ($request->type != null) {

            $var = explode(",", $request->type);

            $col_name = $var[0];

            $query = $var[1];

            $products = $products->orderBy($col_name, $query);

            $sort_type = $request->type;

        }
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();
        if ($request->category_id != null) {
             $products = $products->where('category_id', $request->category_id);
        }
       
        if ($request->search != null) {

            $sort_search = $request->search;

            $products = $products

                ->where('name', 'like', '%' . $sort_search . '%')

                ->orWhereHas('stocks', function ($q) use ($sort_search) {

                    $q->where('sku', 'like', '%' . $sort_search . '%');

                });

        }



        $products = $products->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);
//        if(count($products)){
//            foreach($products as $k => $product){
//                if($product->category && $product->category->parent_id > 0){
//                    $products[$k]->parent_category = Category::where('id', $product->category->parent_id)->first();
//                    $products[$k]->sub_category = $product->category;
//                }else{
//                    $products[$k]->parent_category = $product->category;
//                    $products[$k]->sub_category = NULL;
//                }
//            }
//        }


        return view('backend.product.products.index', compact('products','categories', 'type', 'col_name', 'query', 'sort_search'));

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function seller_products(Request $request)

    {

        $col_name = null;

        $query = null;

        $seller_id = null;

        $sort_search = null;

        $products = Product::where('added_by', 'seller')->where('auction_product', 0)->where('wholesale_product', 0);

        if ($request->has('user_id') && $request->user_id != null) {

            $products = $products->where('user_id', $request->user_id);

            $seller_id = $request->user_id;

        }
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();
        if ($request->category_id != null) {
             $products = $products->where('category_id', $request->category_id);
        }

        if ($request->search != null) {

            $products = $products

                ->where('name', 'like', '%' . $request->search . '%');

            $sort_search = $request->search;

        }

        if ($request->type != null) {

            $var = explode(",", $request->type);

            $col_name = $var[0];

            $query = $var[1];

            $products = $products->orderBy($col_name, $query);

            $sort_type = $request->type;

        }



        $products = $products->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);
//        if(count($products)){
//            foreach($products as $k => $product){
//                if($product->category && $product->category->parent_id > 0){
//                    $products[$k]->parent_category = Category::where('id', $product->category->parent_id)->first();
//                    $products[$k]->sub_category = $product->category;
//                }else{
//                    $products[$k]->parent_category = $product->category;
//                    $products[$k]->sub_category = NULL;
//                }
//            }
//        }
        $type = 'Seller';



        return view('backend.product.products.index', compact('products','categories', 'type', 'col_name', 'query', 'seller_id', 'sort_search'));

    }


    public function all_packages(Request $request)

    {

        $col_name = null;

        $query = null;

        $sort_search = null;

        $packages = ServicePackage::orderBy('id', 'desc');

        if ($request->search != null) {

            $sort_search = $request->search;

            $packages = $packages->where(function ($q) use ($sort_search) {
                         $q->where('name', 'like', '%' . $sort_search . '%')
                            ->orWhere('cost_price', 'like', '%' . $sort_search . '%')
                            ->orWhere('special_price', 'like', '%' . $sort_search . '%')
                            ->orWhere('validity', 'like', '%' . $sort_search . '%');
                     });

        }

        if ($request->type != null) {

            $var = explode(",", $request->type);

            $col_name = $var[0];

            $query = $var[1];

            $packages = $packages->orderBy($col_name, $query);

            $sort_type = $request->type;

        }



        $packages = $packages->paginate(15);

        $type = 'All';



        return view('backend.product.packages.index', compact('packages', 'type', 'col_name', 'query', 'sort_search'));

    }



    public function all_products(Request $request)

    {

        $col_name = null;

        $query = null;

        $seller_id = null;

        $sort_search = null;

        $products = Product::with('category')->orderBy('created_at', 'desc')->where('auction_product', 0)->where('wholesale_product', 0);

        if ($request->has('user_id') && $request->user_id != null) {

            $products = $products->where('user_id', $request->user_id);

            $seller_id = $request->user_id;

        }
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();
        if ($request->category_id != null) {
             $products = $products->where('category_id', $request->category_id);
        }
       
        if ($request->search != null) {

            $sort_search = $request->search;

            $products = $products

                ->where('name', 'like', '%' . $sort_search . '%')

                ->orWhereHas('stocks', function ($q) use ($sort_search) {

                    $q->where('sku', 'like', '%' . $sort_search . '%');

                });

        }

        if ($request->type != null) {

            $var = explode(",", $request->type);

            $col_name = $var[0];

            $query = $var[1];

            $products = $products->orderBy($col_name, $query);

            $sort_type = $request->type;

        }
        
        $products = $products->paginate(15);
//        if(count($products)){
//            foreach($products as $k => $product){
//                if($product->category && $product->category->parent_id > 0){
//                    $products[$k]->parent_category = Category::where('id', $product->category->parent_id)->first();
//                    $products[$k]->sub_category = $product->category;
//                }else{
//                    $products[$k]->parent_category = $product->category;
//                    $products[$k]->sub_category = NULL;
//                }
//            }
//        }
        $type = 'All';

        return view('backend.product.products.index', compact('products','categories' ,'type', 'col_name', 'query', 'seller_id', 'sort_search'));

    }





    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        CoreComponentRepository::initializeCache();



        $categories = Category::where('parent_id', 0)

            ->where('digital', 0)

            ->with('childrenCategories')

            ->get();

        $select_related_products = Product::with('brand')->orderBy('id', 'desc')
                ->where('auction_product', 0)
                ->where('wholesale_product', 0)->get();

        return view('backend.product.products.create', compact('categories','select_related_products'));

    }
    
    
    

    public function choose_addon_products(Request $request)

    {
        //return $request;
        
        $select_products = [];
        if($request->select_addon_products){
            $select_products = Product::with('brand')->orderBy('id', 'desc')->whereIn('id', $request->select_addon_products)->get()->toArray();
        }
        
        $htm = '';
        $flag = false;
        
        $exist_select_products = [];
        if(count($select_products)){
            if(isset($request->id)){
                $exist_select_products = ProductsAddon::where('product_id',$request->id)->get()->toArray();
            }
            $htm = view('backend.product.products.addonProductList', compact('select_products','exist_select_products'))->render();
            $flag = true;
            
        }
        
        $result = array();
        $result['htm'] = $htm;
       
        $data = array();
        $data['data'] = $result;
        $data['flag'] = $flag;
        return Response()->json($data);
    }


    public function create_packages()

    {

        CoreComponentRepository::initializeCache();



        $products =Product::with('brand')->orderBy('id', 'desc')
                ->where('auction_product', 0)
                ->where('wholesale_product', 0)->get();



        return view('backend.product.packages.create', compact('products'));

    }



    public function choose_products(Request $request)

    {
        //return $request;
        
        $select_products = [];
        if($request->select_products){
            $select_products = Product::with('brand')->orderBy('id', 'desc')->whereIn('id', $request->select_products)->get()->toArray();
        }
        $cost_price = 0;
        $htm = '';
        $flag = false;
        $special_price = $request->special_price;
        
        $exist_select_products = [];
        if(count($select_products)){
            
            if(isset($request->id)){
                $exist_select_products = ServicePackageProduct::where('service_package_id',$request->id)->get()->toArray();
            }
            $cost_price = Product::whereIn('id', $request->select_products)->sum('unit_price');
            $htm = view('backend.product.packages.productsList', compact('select_products','exist_select_products'))->render();
            $flag = true;
            
        }else{
//            if(isset($request->id)){
//                $exist_select_products = ServicePackageProduct::where('service_package_id',$request->id)->pluck('product_id')->toArray();
//                if($exist_select_products){
//                    $select_products = Product::orderBy('id', 'desc')->whereIn('id', $exist_select_products)->get()->toArray();
//                    if(count($select_products)){
//                        $cost_price = Product::whereIn('id', $exist_select_products)->sum('unit_price');
//                        $htm = view('backend.product.packages.productsList', compact('select_products','exist_select_products'))->render();
//                        $flag = true;
//                    }
//                }
//            }
        }
        
        if($cost_price < $special_price){
            $special_price = $cost_price;
        }
        $result = array();
        $result['cost_price'] = $cost_price;
        $result['special_price'] = $special_price;
        $result['htm'] = $htm;
       
        $data = array();
        $data['data'] = $result;
        $data['flag'] = $flag;
        return Response()->json($data);
    }
    
    
    public function store_package(Request $request)

    {
        $input = \Illuminate\Support\Facades\Request::all();
        
        
        $rule = array(
            'name' => 'required|max:255',
            'select_products' => 'required',
            'quantity' => 'required',
            //'special_price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'validity' => 'required|numeric',
        );
        
         $messages = array(
            'name.required' => 'Package name is required',
            'quantity.required' => 'Quantity is required',
            'select_products.required' => 'Choose at least one service',
            'special_price.required' => 'Special price is required',
            'special_price.numeric' => 'Special price must be numeric',
            'cost_price.required' => 'Cost price is required',
            'cost_price.numeric' => 'Cost price must be numeric',
            'validity.required' => 'Validity is required',
            'validity.numeric' => 'Validity must be numeric',
        );
         
         $validation = \Illuminate\Support\Facades\Validator::make($input, $rule, $messages);
        if ($validation->fails()) {
            $message = $validation->messages()->first();
            $data = array();
            $data['flag'] = false;
            $data['message'] = $message;
            return Response()->json($data);
        }
        
        $cost_price = Product::whereIn('id', $input['select_products'])->sum('unit_price');
        
        $pkgArr = array();
        $pkgArr['name'] = $input['name'];
        $pkgArr['type'] = $input['type'];
        $pkgArr['validity'] = $input['validity'];
        $pkgArr['cost_price'] = $cost_price;
        $pkgArr['special_price'] = $input['special_price'];
        $pkgArr['status'] = isset($input['status']) ? 1 : 0;
        //return $pkgArr;
        
        $package = ServicePackage::create($pkgArr);
        if($package){
            if(count($input['select_products'])){
                foreach($input['select_products'] as $key => $select_product){
                    $servicePkgArr = array();
                    $servicePkgArr['service_package_id'] = $package->id;
                    $servicePkgArr['product_id'] = $select_product;
                    $servicePkgArr['min_qty'] = $input['quantity'][$key];
                    $servicePkgRes = ServicePackageProduct::create($servicePkgArr);
                }
            }
            
            $data = array();
            $data['flag'] = true;
            $data['message'] = 'Package has been inserted successfully';
            return Response()->json($data);
        }else{
            $data = array();
            $data['flag'] = false;
            $data['message'] = 'Operation error. Please try later';
            return Response()->json($data);
        }
    }
    
    
    public function edit_package(Request $request, $id)

    {

        CoreComponentRepository::initializeCache();

        $package = ServicePackage::where('id',$id)->first();
        if($package){
            $products =Product::with('brand')->orderBy('id', 'desc')
                    ->where('auction_product', 0)
                    ->where('wholesale_product', 0)->get();

            $select_products = ServicePackageProduct::where('service_package_id',$id)->pluck('product_id')->toArray();
            return view('backend.product.packages.edit', compact('package', 'products','select_products'));

        } else {

            flash(translate('Package not found'))->error();

            return back();

        }

    }
    
    public function update_package(Request $request, $id)

    {
        $package = ServicePackage::where('id',$id)->first();
        if(!$package){
            $data = array();
            $data['flag'] = false;
            $data['message'] = 'Package not found';
            return Response()->json($data);
        }
        
        $input = \Illuminate\Support\Facades\Request::all();
        //return $input;
        
        $rule = array(
            'name' => 'required|max:255',
            'select_products' => 'required',
            'quantity' => 'required',
            //'special_price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'validity' => 'required|numeric',
        );
        
         $messages = array(
            'name.required' => 'Package name is required',
            'quantity.required' => 'Quantity is required',
            'select_products.required' => 'Choose at least one service',
            'special_price.required' => 'Special price is required',
            'special_price.numeric' => 'Special price must be numeric',
            'cost_price.required' => 'Cost price is required',
            'cost_price.numeric' => 'Cost price must be numeric',
            'validity.required' => 'Validity is required',
            'validity.numeric' => 'Validity must be numeric',
        );
         
         $validation = \Illuminate\Support\Facades\Validator::make($input, $rule, $messages);
        if ($validation->fails()) {
            $message = $validation->messages()->first();
            $data = array();
            $data['flag'] = false;
            $data['message'] = $message;
            return Response()->json($data);
        }
        
        $cost_price = Product::whereIn('id', $input['select_products'])->sum('unit_price');
        
        $pkgArr = array();
        $pkgArr['name'] = $input['name'];
        $pkgArr['type'] = $input['type'];
        $pkgArr['validity'] = $input['validity'];
        $pkgArr['cost_price'] = $cost_price;
        $pkgArr['special_price'] = $input['special_price'];
        $pkgArr['status'] = isset($input['status']) ? 1 : 0;
        $package = ServicePackage::where('id',$id)->update($pkgArr);
        if($package){
            if(count($input['select_products'])){
                $exist_select_products = [];
                $delete_exist = [];
                if(isset($input['id'])){
                    $exist_select_products = ServicePackageProduct::where('service_package_id',$input['id'])->pluck('product_id')->toArray();
                    foreach($exist_select_products as $exist_select_product){
                        if(!in_array($exist_select_product,$input['select_products'])){
                            $delete_exist[] = $exist_select_product;
                        }
                    }
                }
            
                foreach($input['select_products'] as $key => $select_product){
                    $servicePkgArr = array();
                    $servicePkgArr['service_package_id'] = $id;
                    $servicePkgArr['product_id'] = $select_product;
                    $servicePkgArr['min_qty'] = $input['quantity'][$key];
                    if(count($exist_select_products) && in_array($select_product,$exist_select_products)){
                         $servicePkgRes = ServicePackageProduct::where('service_package_id',$id)->where('product_id',$select_product)->update($servicePkgArr);
                    }else{
                         $servicePkgRes = ServicePackageProduct::create($servicePkgArr);
                    }
                   
                }
                if(count($delete_exist)){
                    ServicePackageProduct::where('service_package_id',$id)->whereIn('product_id',$delete_exist)->delete();
                }
            }
            
            $data = array();
            $data['flag'] = true;
            $data['message'] = 'Package has been updated successfully';
            return Response()->json($data);
        }else{
            $data = array();
            $data['flag'] = false;
            $data['message'] = 'Operation error. Please try later';
            return Response()->json($data);
        }
    }
    
    
    public function destroy_package($id)
    {
        $package = ServicePackage::where('id',$id)->first();
        if($package){
           
            $delete_package = ServicePackage::where('id',$id)->delete();
            if($delete_package){
                ServicePackageProduct::where('service_package_id',$id)->delete();
                flash(translate('Package has been deleted successfully'))->success();

                Artisan::call('view:clear');
                Artisan::call('cache:clear');
                return back();
            }else{
                flash(translate('Something went wrong'))->error();
                return back();
            }
        } else {
            flash(translate('Package not found'))->error();
            return back();

        }
    }
    
    public function update_package_status(Request $request)

    {

        $package = ServicePackage::findOrFail($request->id);

        $package->status = $request->status;

        $package->save();

        return 1;

    }



    public function add_more_choice_option(Request $request)

    {

        $all_attribute_values = AttributeValue::with('attribute')->where('attribute_id', $request->attribute_id)->get();



        $html = '';



        foreach ($all_attribute_values as $row) {

            $html .= '<option value="' . $row->value . '">' . $row->value . '</option>';

        }



        echo json_encode($html);

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(ProductRequest $request)

    {
        //return $request;
        $input = \Illuminate\Support\Facades\Request::all();
        
        $product = $this->productService->store($request->except([

            '_token', 'sku', 'choice', 'tax_id', 'tax', 'tax_type', 'flash_deal_id', 'flash_discount', 'flash_discount_type'

        ]));



        //VAT & Tax

        if($request->tax_id) {

            $request->merge(['product_id' => $product->id]);

            $this->productTaxService->store($request->only([

                'tax_id', 'tax', 'tax_type', 'product_id'

            ]));

        }



        //Flash Deal

        $this->productFlashDealService->store($request->only([

            'flash_deal_id', 'flash_discount', 'flash_discount_type'

        ]), $product);

        //Addon Products
        if(array_key_exists('select_addon_products', $input) && count($input['select_addon_products'])){
            foreach($input['select_addon_products'] as $key => $select_addon_product_id){
                $addProductArr = array();
                $addProductArr['product_id'] = $product->id;
                $addProductArr['related_product_id'] = $select_addon_product_id;
                if(array_key_exists('addon_product_status'. $select_addon_product_id, $input)){
                    $addProductArr['addon_product_status'] = true;
                }else{
                    $addProductArr['addon_product_status'] = false;
                }
                $addProductRes = ProductsAddon::create($addProductArr);
            }
        }



        //Product Stock

        $this->productStockService->store($request->only([

            'colors_active', 'colors', 'choice_no', 'unit_price', 'sku', 'current_stock', 'product_id'

        ]), $product);



        // Product Translations

        $request->merge(['lang' => env('DEFAULT_LANGUAGE')]);

        ProductTranslation::create($request->only([

            'lang', 'name', 'unit', 'description', 'product_id'

        ]));



        flash(translate('Product has been inserted successfully'))->success();



        Artisan::call('view:clear');

        Artisan::call('cache:clear');



        return redirect()->route('products.admin');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function admin_product_edit(Request $request, $id)

    {

        CoreComponentRepository::initializeCache();



        $product = Product::findOrFail($id);

        if ($product->digital == 1) {

            return redirect('admin/digitalproducts/' . $id . '/edit');

        }



        $lang = $request->lang;

        $tags = json_decode($product->tags);

        $categories = Category::where('parent_id', 0)

            ->where('digital', 0)

            ->with('childrenCategories')

            ->get();
        
        
        $select_related_products = Product::with('brand')->orderBy('id', 'desc')
                ->where('id','!=' ,$id)
                ->where('auction_product', 0)
                ->where('wholesale_product', 0)->get();
        
        $select_products = ProductsAddon::where('product_id',$id)->pluck('related_product_id')->toArray();

        return view('backend.product.products.edit', compact('product', 'categories', 'tags', 'lang','select_related_products','select_products'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function seller_product_edit(Request $request, $id)

    {

        $product = Product::findOrFail($id);

        if ($product->digital == 1) {

            return redirect('digitalproducts/' . $id . '/edit');

        }

        $lang = $request->lang;

        $tags = json_decode($product->tags);

        // $categories = Category::all();

        $categories = Category::where('parent_id', 0)

            ->where('digital', 0)

            ->with('childrenCategories')

            ->get();



        return view('backend.product.products.edit', compact('product', 'categories', 'tags', 'lang'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(ProductRequest $request, Product $product)
    {
        $input = \Illuminate\Support\Facades\Request::all();
        //return $input;
        //Product
        $products = Product::where('id',$product->id)->orWhere('parent_product_id',$product->id)->get();

        foreach ($products as $product){
            $request->merge(['id' => $product->id]);

            $product = $this->productService->update($request->except([
                '_token', 'sku', 'choice', 'tax_id', 'tax', 'tax_type', 'flash_deal_id', 'flash_discount', 'flash_discount_type'
            ]), $product);

            //Product Stock
            foreach ($product->stocks as $key => $stock) {
                $stock->delete();
            }

            $request->merge(['product_id' => $product->id]);
            $this->productStockService->store($request->only([
                'colors_active', 'colors', 'choice_no', 'unit_price', 'sku', 'current_stock', 'product_id'
            ]), $product);

            //Flash Deal
            $this->productFlashDealService->store($request->only([
                'flash_deal_id', 'flash_discount', 'flash_discount_type'
            ]), $product);

            //VAT & Tax
            if ($request->tax_id) {
                ProductTax::where('product_id', $product->id)->delete();
                $request->merge(['product_id' => $product->id]);
                $this->productTaxService->store($request->only([
                    'tax_id', 'tax', 'tax_type', 'product_id'
                ]));
            }

            // Product Translations

            ProductTranslation::updateOrCreate(
                $request->only([
                    'lang', 'product_id'
                ]),
                $request->only([
                    'name', 'unit', 'description'
                ])
            );
            
            
            $exist_select_products = [];
            $delete_exist = [];
            if(isset($input['id'])){
                $exist_select_products = ProductsAddon::where('product_id',$input['id'])->pluck('related_product_id')->toArray();
                foreach($exist_select_products as $exist_select_product){
                    if(array_key_exists('select_addon_products', $input) && count($input['select_addon_products'])){
                        if(!in_array($exist_select_product,$input['select_addon_products'])){
                            $delete_exist[] = $exist_select_product;
                        }
                    }else{
                        $delete_exist[] = $exist_select_product;
                    }
                }
            }
            if(array_key_exists('select_addon_products', $input) && count($input['select_addon_products'])){
                foreach($input['select_addon_products'] as $key => $select_addon_product_id){
                    $addProductArr = array();
                    $addProductArr['product_id'] = $product->id;
                    $addProductArr['related_product_id'] = $select_addon_product_id;
                    if(array_key_exists('addon_product_status'. $select_addon_product_id, $input)){
                        $addProductArr['addon_product_status'] = true;
                    }else{
                        $addProductArr['addon_product_status'] = false;
                    }
                    
                    if(count($exist_select_products) && in_array($select_addon_product_id,$exist_select_products)){
                         $servicePkgRes = ProductsAddon::where('product_id',$product->id)->where('related_product_id',$select_addon_product_id)->update($addProductArr);
                    }else{
                         $servicePkgRes = ProductsAddon::create($addProductArr);
                    }                
                   
                }
            }
            if(count($delete_exist)){
                ProductsAddon::where('product_id',$product->id)->whereIn('related_product_id',$delete_exist)->delete();
            }
        }


        flash(translate('Product has been updated successfully'))->success();
        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $product = Product::findOrFail($id);



        $product->product_translations()->delete();

        $product->stocks()->delete();

        $product->taxes()->delete();



        if (Product::destroy($id)) {

            Cart::where('product_id', $id)->delete();



            flash(translate('Product has been deleted successfully'))->success();



            Artisan::call('view:clear');

            Artisan::call('cache:clear');



            return back();

        } else {

            flash(translate('Something went wrong'))->error();

            return back();

        }

    }



    public function bulk_product_delete(Request $request)

    {

        if ($request->id) {

            foreach ($request->id as $product_id) {

                $this->destroy($product_id);

            }

        }



        return 1;

    }



    /**

     * Duplicates the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function duplicate(Request $request, $id)

    {

        $product = Product::find($id);



        $product_new = $product->replicate();

        $product_new->slug = $product_new->slug . '-' . Str::random(5);

        $product_new->save();



        //Product Stock

        $this->productStockService->product_duplicate_store($product->stocks, $product_new);



        //VAT & Tax

        $this->productTaxService->product_duplicate_store($product->taxes, $product_new);



        flash(translate('Product has been duplicated successfully'))->success();

        if ($request->type == 'In House')

            return redirect()->route('products.admin');

        elseif ($request->type == 'Seller')

            return redirect()->route('products.seller');

        elseif ($request->type == 'All')

            return redirect()->route('products.all');

    }



    public function get_products_by_brand(Request $request)

    {

        $products = Product::where('brand_id', $request->brand_id)->get();

        return view('partials.product_select', compact('products'));

    }



    public function updateTodaysDeal(Request $request)

    {

        $product = Product::findOrFail($request->id);

        $product->todays_deal = $request->status;

        $product->save();

        Cache::forget('todays_deal_products');

        return 1;

    }



    public function updatePublished(Request $request)

    {

        $product = Product::findOrFail($request->id);

        $product->published = $request->status;



        if ($product->added_by == 'seller' && addon_is_activated('seller_subscription') && $request->status == 1) {

            $shop = $product->user->shop;

            if (

                $shop->package_invalid_at == null

                || Carbon::now()->diffInDays(Carbon::parse($shop->package_invalid_at), false) < 0

                || $shop->product_upload_limit <= $shop->user->products()->where('published', 1)->count()

            ) {

                return 0;

            }

        }



        $product->save();

        return 1;

    }



    public function updateProductApproval(Request $request)

    {

        $product = Product::findOrFail($request->id);

        $product->approved = $request->approved;



        if ($product->added_by == 'seller' && addon_is_activated('seller_subscription')) {

            $shop = $product->user->shop;

            if (

                $shop->package_invalid_at == null

                || Carbon::now()->diffInDays(Carbon::parse($shop->package_invalid_at), false) < 0

                || $shop->product_upload_limit <= $shop->user->products()->where('published', 1)->count()

            ) {

                return 0;

            }

        }



        $product->save();

        return 1;

    }



    public function updateFeatured(Request $request)

    {

        $product = Product::findOrFail($request->id);

        $product->featured = $request->status;

        if ($product->save()) {

            Artisan::call('view:clear');

            Artisan::call('cache:clear');

            return 1;

        }

        return 0;

    }



    public function sku_combination(Request $request)

    {

        $options = array();

        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {

            $colors_active = 1;

            array_push($options, $request->colors);

        } else {

            $colors_active = 0;

        }



        $unit_price = $request->unit_price;

        $product_name = $request->name;



        if ($request->has('choice_no')) {

            foreach ($request->choice_no as $key => $no) {

                $name = 'choice_options_' . $no;

                $data = array();

                // foreach (json_decode($request[$name][0]) as $key => $item) {

                foreach ($request[$name] as $key => $item) {

                    // array_push($data, $item->value);

                    array_push($data, $item);

                }

                array_push($options, $data);

            }

        }



        $combinations = Combinations::makeCombinations($options);

        return view('backend.product.products.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));

    }



    public function sku_combination_edit(Request $request)

    {

        $product = Product::findOrFail($request->id);



        $options = array();

        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {

            $colors_active = 1;

            array_push($options, $request->colors);

        } else {

            $colors_active = 0;

        }



        $product_name = $request->name;

        $unit_price = $request->unit_price;



        if ($request->has('choice_no')) {

            foreach ($request->choice_no as $key => $no) {

                $name = 'choice_options_' . $no;

                $data = array();

                // foreach (json_decode($request[$name][0]) as $key => $item) {

                foreach ($request[$name] as $key => $item) {

                    // array_push($data, $item->value);

                    array_push($data, $item);

                }

                array_push($options, $data);

            }

        }



        $combinations = Combinations::makeCombinations($options);

        return view('backend.product.products.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));

    }

}

