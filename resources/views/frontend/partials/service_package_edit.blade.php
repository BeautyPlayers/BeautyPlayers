<div class="form-group row">
    <div class="col-md-12 col-12">
        <label class="col-from-label">{{translate('Tag service to package')}} <span class="text-danger">*</span></label>
        <!-- <select class="form-control aiz-selectpicker" data-live-search="true" data-selected-text-format="count" name="select_products[]" id="select_products" multiple required> -->
            @foreach ($products as $key => $product)
            <!-- <option  value="{{ $product->id }}" <?php /* (in_array($product->id, $select_products)) ? 'selected' : '' ?> data-content="<span><span>{{ $product->name }}</span><?= $product->brand ? '<span>[' .$product->brand->name . ']</span>'  : '' */?></span>"></option> -->
            <p>{{ ($product->brand)?$product->brand->name:'' }}</p>
            @endforeach
        <!-- </select> -->
    </div>
</div>