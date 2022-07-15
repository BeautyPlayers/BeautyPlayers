@extends('backend.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{translate('All Appointments')}}</h1>
            </div>
        </div>
    </div>

    <div class="card">
        <form class="" id="sort_sellers" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col">
                    <h5 class="mb-md-0 h6">{{ translate('Appointments') }}</h5>
                </div>

                <div class="dropdown mb-2 mb-md-0">
                    <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                        {{translate('Bulk Action')}}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" onclick="bulk_delete()">{{translate('Delete selection')}}</a>
                    </div>
                </div>

                <div class="col-md-3 ml-auto">
                    <select class="form-control aiz-selectpicker" name="approved_status" id="approved_status" onchange="sort_sellers()">
                        <option value="">{{translate('Filter by Approval')}}</option>
                        <option value="1"  @isset($approved) @if($approved == 'paid') selected @endif @endisset>{{translate('Approved')}}</option>
                        <option value="0"  @isset($approved) @if($approved == 'unpaid') selected @endif @endisset>{{translate('Non-Approved')}}</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name or email & Enter') }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                    <tr>
                        <th>
                            <div class="form-group">
                                <div class="aiz-checkbox-inline">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-all">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </th>
                        <th data-breakpoints="lg">{{translate('Patient')}}</th>
                        <th data-breakpoints="lg"></th>
                        <th data-breakpoints="lg">{{translate('Doctor')}}</th>
                        <th data-breakpoints="lg"></th>
                        <th data-breakpoints="lg">{{translate('Service Name')}}</th>
                        <th data-breakpoints="lg">{{translate('Status')}}</th>
                        <th data-breakpoints="lg">{{translate('Booking Info')}}</th>
                        <th data-breakpoints="lg">{{ translate('Amount') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shops as $key => $shop)
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="aiz-checkbox-inline">
                                        <label class="aiz-checkbox">
                                            <input type="checkbox" class="check-one" name="id[]" value="{{$shop->id}}">
                                            <span class="aiz-square-check"></span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <img
                                    src="@if ($shop->customer_id) {{ asset(\App\Models\User::where('id', $shop->customer_id)->first()->avatar) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif"
                                    width="60"
                                    height="100"
                                    class="img-fluid lazyload"
                                >
                            </td>
                            <td>{{ \App\Models\User::where('id', $shop->customer_id)->first()->name }}</td>
                            <td>
                                <img
                                    src="@if ($shop->user_id) {{ asset($shop->user->avatar) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif"
                                    width="60"
                                    height="100"
                                    class="img-fluid lazyload"
                                >
                            </td>
                            <td>{{ $shop->user->name }}</td>
                            <td>Disease</td>
                            <td>{{ ucfirst($shop->booking_status) }}</td>
                            <td>{{ $shop->booking_time }}</td>
                            <td>$500</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    {{ $shops->appends(request()->input())->links() }}
                </div>
            </div>
        </form>
    </div>

@endsection

@section('modal')
    <!-- Delete Modal -->
    @include('modals.delete_modal')

    <!-- Seller Profile Modal -->
    <div class="modal fade" id="profile_modal">
        <div class="modal-dialog">
            <div class="modal-content" id="profile-modal-content">

            </div>
        </div>
    </div>

    <!-- Seller Payment Modal -->
    <div class="modal fade" id="payment_modal">
        <div class="modal-dialog">
            <div class="modal-content" id="payment-modal-content">

            </div>
        </div>
    </div>

    <!-- Ban Seller Modal -->
    <div class="modal fade" id="confirm-ban">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6">{{translate('Confirmation')}}</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{translate('Do you really want to ban this seller?')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>
                    <a class="btn btn-primary" id="confirmation">{{translate('Proceed!')}}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Unban Seller Modal -->
    <div class="modal fade" id="confirm-unban">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6">{{translate('Confirmation')}}</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{translate('Do you really want to unban this seller?')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>
                    <a class="btn btn-primary" id="confirmationunban">{{translate('Proceed!')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on("change", ".check-all", function() {
            if(this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;
                });
            }

        });

        function show_seller_payment_modal(id){
            $.post('{{ route('sellers.payment_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#payment_modal #payment-modal-content').html(data);
                $('#payment_modal').modal('show', {backdrop: 'static'});
                $('.demo-select2-placeholder').select2();
            });
        }

        function show_seller_profile(id){
            $.post('{{ route('sellers.profile_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#profile_modal #profile-modal-content').html(data);
                $('#profile_modal').modal('show', {backdrop: 'static'});
            });
        }

        function update_approved(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('sellers.approved') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Approved sellers updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function sort_sellers(el){
            $('#sort_sellers').submit();
        }

        function confirm_ban(url)
        {
            $('#confirm-ban').modal('show', {backdrop: 'static'});
            document.getElementById('confirmation').setAttribute('href' , url);
        }

        function confirm_unban(url)
        {
            $('#confirm-unban').modal('show', {backdrop: 'static'});
            document.getElementById('confirmationunban').setAttribute('href' , url);
        }

        function bulk_delete() {
            var data = new FormData($('#sort_sellers')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('bulk-seller-delete')}}",
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response == 1) {
                        location.reload();
                    }
                }
            });
        }

    </script>
@endsection
