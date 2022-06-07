@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">{{translate('All packages')}}</h1>
        </div>
        <div class="col text-right">
            <a href="{{ route('packages.create') }}" class="btn btn-circle btn-info">
                <span>{{translate('Add New Package')}}</span>
            </a>
        </div>
    </div>
</div>
<br>

<div class="card">
    <form class="" id="sort_packages" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">{{ translate('All Package') }}</h5>
            </div>

            <?php
            /* <div class="dropdown mb-2 mb-md-0">
              <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
              {{translate('Bulk Action')}}
              </button>
              <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#" onclick="bulk_delete()"> {{translate('Delete selection')}}</a>
              </div>
              </div> */
            ?>
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type & Enter') }}">
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
                        <!--<th data-breakpoints="lg">#</th>-->
                        <th>{{translate('Name')}}</th>
                        <th data-breakpoints="sm">{{translate('Price')}}</th>
                        <th data-breakpoints="sm">{{translate('Type')}}</th>
                        <th data-breakpoints="lg">{{translate('Status')}}</th>

                        <th data-breakpoints="sm" class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $key => $package)
                    <tr>
                        <!--<td>{{ ($key+1) + ($packages->currentPage() - 1)*$packages->perPage() }}</td>-->
                        <td>
                            <div class="form-group d-inline-block">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" class="check-one" name="id[]" value="{{$package['id']}}">
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="row gutters-5 w-200px w-md-300px mw-100">
                                <div class="col">
                                    <span class="text-muted text-truncate-2">{{ $package['name'] }}</span>
                                </div>
                            </div>
                        </td>                       
                        <td>
                            <strong>{{translate('Cost Price')}}:</strong> {{ single_price($package['cost_price']) }} </br>
                            <strong>{{translate('Special Price')}}:</strong> {{ single_price($package['special_price']) }}
                        </td>
                        <td>
                            @if($package->type == 1)
                            Fixed
                            @else
                            Customize
                            @endif
                        </td>

                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_status(this)" value="{{ $package->id }}" type="checkbox" <?php if ($package->status == 1) echo "checked"; ?> >
                                <span class="slider round"></span>
                            </label>
                        </td>

                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('packages.edit', $package->id)}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('packages.destroy', $package->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $packages->appends(request()->input())->links() }}
            </div>
        </div>
    </form>
</div>

@endsection

@section('modal')
@include('modals.delete_modal')
@endsection


@section('script')
<script type="text/javascript">

    $(document).on("change", ".check-all", function() {
    if (this.checked) {
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
    $(document).ready(function(){
    //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
    });
    function update_status(el){
    if (el.checked){
    var status = 1;
    }
    else{
    var status = 0;
    }
    $.post('{{ route('packages.status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
    if (data == 1){
    AIZ.plugins.notify('success', '{{ translate('Package updated successfully') }}');
    }
    else{
    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
    }
    });
    }

    function sort_packages(el){
    $('#sort_packages').submit();
    }

    function bulk_delete() {
    var data = new FormData($('#sort_packages')[0]);
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{route('bulk-product-delete')}}",
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
            if (response == 1) {
            location.reload();
            }
            }
    });
    }

</script>
@endsection
