@extends('frontend.layouts.app')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@section('content')
    <section class="mb-4">
        <div class="container mt-3">
            <div class="row gutters-10">
                <div class="col-xl-12 order-0 order-xl-1">
                    <div class="bg-white mb-3 shadow-sm rounded">
                        <form action="{{ route('shop.booking.store') }}" method="POST">
                            @csrf
                            <div class="col-8 border-left border-light">
                                <div class="col-3">
                                    <a href="{{ route('shop.visit', $seller->slug) }}" class="d-block p-3">
                                        <img
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="@if ($seller->logo !== null) {{ uploaded_asset($seller->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif"
                                            alt="{{ $seller->name }}"
                                            class="img-fluid lazyload">
                                    </a>
                                </div>
                                <div class="p-3 text-left clearfix">
                                    {{--                                    <div class="rating rating-sm mb-2 float-right">--}}
                                    {{--                                        <label for="datetimepickr">Appointment Schedule</label>--}}
                                    {{--                                        <input type="text" class="form-control" id="datetimepickr" name="date_and_time">--}}
                                    {{--                                        <input type="hidden" name="shop_id" value="{{ $seller->id }}">--}}
                                    {{--                                    </div>--}}
                                    <h2 class="h6 fw-600 text-truncate">
                                        {{ $seller->name }}
                                    </h2>
                                    <div class="rating rating-sm mb-2">
                                        {{ renderStarRating($seller->rating) }}
                                    </div>
                                    <div class="rating rating-sm mb-2">
                                        {{ $seller->address }}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-4">
        <div class="container mt-3">
            <div class="row gutters-10">
                <div class="col-xl-12 order-0 order-xl-1">
                    <div class="bg-white mb-3 shadow-sm rounded">
                        <form action="{{ route('shop.booking.store') }}" method="POST">
                            @csrf
                            <div class="p-3 text-left">
                                <input type="hidden" name="shop_id" value="{{ $seller->id }}">
                                <div class="col-md-12 d-flex align-items-center justify-content-end">
                                    <div class="col-md-10">
                                        <label for="datetimepickr">DateTime: </label>
                                        <input type="text" class="form-control" id="datetimepickr" name="date_and_time">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-sm btn-soft-primary custom mt-4 float-right">
                                            <span>Submit</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function () {
            flatpickr("#datetimepickr", {
                altInput: true,
                altFormat: "F j, Y : H:i",
                dateFormat: "Y-m-d H:i:s",
                enableTime: true,
            });
        });
    </script>
@endsection
