<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $sort_search = null;
        $approved = null;

        $shop = Shop::where('user_id', auth()->id())->first();
        $bookings = Booking::with('user')->where('shop_id', $shop->id)->paginate(15);
        
        return view('seller.appointment.index', compact('bookings', 'shop', 'sort_search', 'approved'));
    }

    public function seller_booking_status($id)
    {
        Booking::find($id)->update([
            'status' => request('status')
        ]);

        flash('Your Booking Status updated!')->success();
        return back();
    }
}
