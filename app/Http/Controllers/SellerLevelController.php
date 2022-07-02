<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerLevel;

class SellerLevelController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $sort_search = null;
        $sellerlevels = SellerLevel::orderBy('name', 'asc');

        if ($request->has('search')) {
            $sort_search = $request->search;
            $sellerlevels = $sellerlevels->where('name', 'like', '%' . $sort_search . '%')->orWhere('commission', 'like', '%' . $sort_search . '%');
            $sort_search = strtolower($sort_search);
            if ($sort_search == 'yes') {
                $sellerlevels = $sellerlevels->orWhere('status', 1)->orWhere('is_default', 1);
            } elseif ($sort_search == 'no') {
                $sellerlevels = $sellerlevels->orWhere('status', 0)->orWhere('is_default', 0);
            }
        }

        $sellerlevels = $sellerlevels->paginate(15);
        return view('backend.sellers.levels.index', compact('sellerlevels', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $all_sellerlevels = SellerLevel::all();
        return view('backend.sellers.levels.create', compact('all_sellerlevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'commission' => 'required',
        ]);

        $sellerlevel = new SellerLevel;

        $sellerlevel->name = $request->name;
        $sellerlevel->commission = $request->commission;
        $sellerlevel->status = isset($request->status) ? 1 : 0;
        $sellerlevel->is_default = isset($request->is_default) ? 1 : 0;
        $sellerlevel->save();


        flash(translate('Seller level has been created successfully'))->success();
        return redirect()->route('seller-levels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $sellerlevel = SellerLevel::find($id);
        $all_sellerlevels = SellerLevel::all();

        return view('backend.sellers.levels.edit', compact('sellerlevel', 'all_sellerlevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:255',
            'commission' => 'required',
        ]);

        $sellerlevel = SellerLevel::find($id);

        $sellerlevel->name = $request->name;
        $sellerlevel->commission = $request->commission;
        $sellerlevel->status = isset($request->status) ? 1 : 0;
        $sellerlevel->is_default = isset($request->is_default) ? 1 : 0;
        $sellerlevel->save();


        flash(translate('Seller level has been updated successfully'))->success();
        return redirect()->route('seller-levels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        SellerLevel::find($id)->delete();

        return redirect('admin/seller-levels');
    }

}
