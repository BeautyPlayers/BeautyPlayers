<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $sort_search = null;
        $approved = null;

        $shops = Shop::select('shops.*', \DB::raw('bookings.date_and_time as booking_time, bookings.shop_id as shop_id, bookings.user_id as customer_id, bookings.status as booking_status'))
            ->leftJoin('bookings', function ($join) {
                $join->on('shops.id', '=', 'bookings.shop_id');
            })->whereNotNull('bookings.shop_id')
            ->latest();

        if ($request->has('search')) {
            $sort_search = $request->search;
            $user_ids = User::where('user_type', 'seller')->where(function ($user) use ($sort_search) {
                $user->where('name', 'like', '%' . $sort_search . '%')->orWhere('email', 'like', '%' . $sort_search . '%');
            })->pluck('id')->toArray();

            $shops = $shops->where(function ($shops) use ($user_ids) {
                $shops->whereIn('shops.user_id', $user_ids);
            });
        }
        if ($request->approved_status != null) {
            $approved = $request->approved_status;
            $shops = $shops->where('verification_status', $approved);
        }

        $shops = $shops->paginate(15);

        return view('backend.appointment.index', compact('shops', 'sort_search', 'approved'));
    }
}
