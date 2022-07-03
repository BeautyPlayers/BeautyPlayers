<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerTag;

class SellerTagController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $sort_search = null;
        $sellertags = SellerTag::orderBy('name', 'asc');

        if ($request->has('search')) {
            $sort_search = $request->search;
            $sellertags = $sellertags->where('name', 'like', '%' . $sort_search . '%');
            $sort_search = strtolower($sort_search);
            if ($sort_search == 'yes') {
                $sellertags = $sellertags->orWhere('status', 1);
            } elseif ($sort_search == 'no') {
                $sellertags = $sellertags->orWhere('status', 0);
            }
        }

        $sellertags = $sellertags->paginate(15);
        return view('backend.sellers.tags.index', compact('sellertags', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $all_sellertags = SellerTag::all();
        return view('backend.sellers.tags.create', compact('all_sellertags'));
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
        ]);

        $sellertag = new SellerTag;

        $sellertag->name = $request->name;
        $sellertag->status = isset($request->status) ? 1 : 0;
        $sellertag->save();


        flash(translate('Tag has been created successfully'))->success();
        return redirect()->route('seller-tags.index');
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
        $sellertag = SellerTag::find($id);
        $all_sellertags = SellerTag::all();

        return view('backend.sellers.tags.edit', compact('sellertag', 'all_sellertags'));
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
        ]);

        $sellertag = SellerTag::find($id);

        $sellertag->name = $request->name;
        $sellertag->status = isset($request->status) ? 1 : 0;
        $sellertag->save();


        flash(translate('Tag has been updated successfully'))->success();
        return redirect()->route('seller-tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        SellerTag::find($id)->delete();

        return redirect('admin/seller-tags');
    }

}
