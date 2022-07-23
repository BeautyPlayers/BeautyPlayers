<style>
    span {
        cursor:pointer; 
    }
    .number{
        /*margin:100px;*/
    }
    .minus, .plus{
        width: 30px;
        height: 30px;
        line-height: 20px;
        /* background: #f2f2f2; */
        border-radius: 4px 0px 0px 4px;
        padding: 5px;
        border: 1px solid #ddd;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        margin-right: -4px;
    }

    .plus{
        border-radius: 0px 4px 4px 0px;
        margin-left: -4px;
    }
    .service-qty input{
        height: 30px;
        width: 30px;
        text-align: center;
        /* font-size: 16px; */
        border: 1px solid #ddd;
        /*border-radius: 4px;*/
        display: inline-block;
        vertical-align: middle;
    }
    </style>
<form class="choice_form" id="choice_form">
<div class="form-group row">
    <input name="_method" type="hidden" value="POST">
    <input type="hidden" name="id" value="{{ $servicePackage->id }}">
    <div class="col-lg-6">
        <div class="dropdown bootstrap-select form-control dropup">
            <label class="col-from-label">{{translate('Tag service to package')}} <span class="text-danger">*</span></label>
            <select class="form-control aiz-selectpicker" data-live-search="true" data-live-search="true" data-selected-text-format="count" name="select_products[]" id="select_products" multiple required>
                @foreach ($products as $key => $product)
                <option  value="{{ $product->id }}" <?=  (in_array($product->id, $select_products)) ? 'selected' : '' ?> data-content="<span><span>{{ $product->name }}</span><?= $product->brand ? '<span>[' .$product->brand->name . ']</span>'  : '' ?></span>"></option>
                <p>{{ ($product->brand)?$product->brand->name:'' }}</p>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Services')}}</h5>
            </div>
            <div class="card-body">
    
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="choose_products" id="choose_products">
    
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="validity">
                            {{translate('Package Validity')}}
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="validity" min="1" step="1" placeholder="{{translate('Package Validity')}}" value="{{ $servicePackage->validity }}" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">{{translate('Days')}}</span>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <label for="cost_price">
                            {{translate('Cost Price')}}
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">{{translate('₹')}}</span>
                            </div>
                            <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Cost price') }}" name="cost_price" class="form-control cost_price" required readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="special_price">
                            {{translate('Special Price')}}
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">{{translate('₹')}}</span>
                            </div>
                            <input type="number" lang="en" min="0" step="0.01" placeholder="{{ translate('Special Price') }}"  value="{{ $servicePackage->special_price }}" name="special_price" class="form-control special_price">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
    $('form').bind('submit', function (e) {
        if ($(".action-btn").attr('attempted') == 'true') {
            //stop submitting the form because we have already clicked submit.
            e.preventDefault();
        } else {
            $(".action-btn").attr("attempted", 'true');
        }
        // Disable the submit button while evaluating if the form should be submitted
        // $("button[type='submit']").prop('disabled', true);

        // var valid = true;

        // if (!valid) {
        // e.preventDefault();

        ////Reactivate the button if the form was not submitted
        // $("button[type='submit']").button.prop('disabled', false);
        // }
    });

    $('#select_products').on('change', function () {
        update_services();
    });

    function delete_row(em) {
        $(em).closest('.form-group row').remove();
        update_services();
    }

    function update_services() {
        console.log("log::",$('#choice_form').serialize());
        $.ajax({
            type: "POST",
            url: '{{ route('packages.choose_products') }}',
            data: $('#choice_form').serialize(),
            success: function (data) {
                //console.log(data);
                if (data.flag) {
                    $('.special_price').val(data.data.special_price);
                } else {
                    
//                        $('#choice_form #choose_products').html('');
                }
                $('#choice_form #choose_products').html(data.data.htm);
                $('.cost_price').val(data.data.cost_price);
                $('.special_price').attr('max', data.data.cost_price);
                AIZ.extra.plusMinus();
            }
        });
    }
    update_services();
    
    

    $('#choice_form').on('click', '.minus', function () {
        console.log("Minus Click");
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('#choice_form').on('click', '.plus', function () {
        console.log("Plus Click");
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    function updateQuantity($this) {
        var $id = $($this).attr('data-id');

    }

    $("#choice_form").on("submit", function (event) {
        event.preventDefault();


        var form = $('#choice_form')[0];
        var data = new FormData(form);
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: "{{route('packages.update', $servicePackage->id)}}",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (res) {
                console.log(res);
                if (res.flag) {
                    AIZ.plugins.notify('success', res.message);
                    window.location.reload();
                } else {
                    AIZ.plugins.notify('danger', res.message);
                }
            },
            error: function (res) {

            }
        });
    });
</script>
