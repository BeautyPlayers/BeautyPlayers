@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Tag')}}</h5>
            </div>
            <div class="card-body">
                <form id="add_form" class="form-horizontal" action="{{ route('seller-tags.update', $sellertag->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group row">
                        <label class="col-md-3 col-12 col-form-label">{{translate('Name')}}</label>
                        <div class="col-md-6 col-12">
                            <input type="text" placeholder="{{translate('Name')}}" id="name" name="name" class="form-control" value="{{ $sellertag->name }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-md-3 col-md-6 col-12">
                            <div><label class="col-from-label">{{translate('Status')}}</label></div>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" name="status" value="1" <?= $sellertag->status == 1 ? 'checked' : '' ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">
                            {{translate('Save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
