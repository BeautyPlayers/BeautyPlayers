@extends('seller.layouts.app')

@section('panel_content')

    <div class="card">
        <form id="sort_orders" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('Booking') }}</h5>
                </div>
                {{--                <div class="col-md-3 ml-auto">--}}
                {{--                    <select class="form-control aiz-selectpicker" data-placeholder="{{ translate('Filter by Payment Status')}}" name="payment_status" onchange="sort_orders()">--}}
                {{--                        <option value="">{{ translate('Filter by Payment Status')}}</option>--}}
                {{--                        <option value="paid" @isset($payment_status) @if($payment_status == 'paid') selected @endif @endisset>{{ translate('Paid')}}</option>--}}
                {{--                        <option value="unpaid" @isset($payment_status) @if($payment_status == 'unpaid') selected @endif @endisset>{{ translate('Un-Paid')}}</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}

                {{--                <div class="col-md-3 ml-auto">--}}
                {{--                    <select class="form-control aiz-selectpicker" data-placeholder="{{ translate('Filter by Payment Status')}}" name="delivery_status" onchange="sort_orders()">--}}
                {{--                        <option value="">{{ translate('Filter by Deliver Status')}}</option>--}}
                {{--                        <option value="pending" @isset($delivery_status) @if($delivery_status == 'pending') selected @endif @endisset>{{ translate('Pending')}}</option>--}}
                {{--                        <option value="confirmed" @isset($delivery_status) @if($delivery_status == 'confirmed') selected @endif @endisset>{{ translate('Confirmed')}}</option>--}}
                {{--                        <option value="on_delivery" @isset($delivery_status) @if($delivery_status == 'on_delivery') selected @endif @endisset>{{ translate('On delivery')}}</option>--}}
                {{--                        <option value="delivered" @isset($delivery_status) @if($delivery_status == 'delivered') selected @endif @endisset>{{ translate('Delivered')}}</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-3">--}}
                {{--                    <div class="from-group mb-0">--}}
                {{--                        <input type="text" class="form-control" id="search" name="search" @isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </form>

        @if (count($bookings) > 0)
            <div class="card-body p-3">
                <table class="table aiz-table mb-0">
                    <thead>
                    <tr>
                        <th>{{ translate('Name')}}</th>
                        <th data-breakpoints="lg">{{ translate('Phone')}}</th>
                        <th data-breakpoints="lg">{{ translate('Email Address')}}</th>
                        <th data-breakpoints="md">{{ translate('Booking Info')}}</th>
                        <th data-breakpoints="lg">{{ translate('Status')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bookings as $key => $booking)
                        <tr>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->user->phone }}</td>
                            <td>{{ $booking->user->email }}</td>
                            <td>{{ $booking->date_and_time }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button"
                                            class="btn btn-sm btn-circle btn-soft-primary btn-icon dropdown-toggle no-arrow"
                                            data-toggle="dropdown" href="javascript:void(0);" role="button"
                                            aria-haspopup="false" aria-expanded="false">
                                        <i class="las la-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        @foreach(['pending', 'approved', 'decline'] as $status)
                                            <a href="{{ route('seller.bookings.status', ['id' => $booking->id, 'status' => $status]) }}"
                                               class="dropdown-item {{ $booking->status == $status ? 'active' : '' }}">
                                                {{translate($status)}}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    {{ $bookings->links() }}
                </div>
            </div>
        @endif
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function sort_orders(el) {
            $('#sort_orders').submit();
        }
    </script>
@endsection
