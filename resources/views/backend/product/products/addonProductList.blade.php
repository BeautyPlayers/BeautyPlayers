<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Default</th>
            <!--<th>Delete</th>-->
        </tr>
    </thead>
    <tbody>
        @foreach($select_products as $key => $select_product)
        <tr>
            <td>
                {{ $select_product['name'] }}
                @if($select_product['brand'])
                <br><small>Brand: {{ $select_product['brand']['name'] }}</small>
                @endif
            </td>
            <td>
                <div>
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <?php
                        if (count($exist_select_products)) {
                            $onceGot = false;
                            foreach ($exist_select_products as $exist_product) {
                                if ($select_product['id'] == $exist_product['related_product_id']) {
                                    $onceGot = true;
                                    ?>
                                    <input type="checkbox" name="addon_product_status{{ $select_product['id'] }}" class="addon_product_status{{ $select_product['id'] }}" id="addon_product_status{{ $select_product['id'] }}" data-id="{{ $select_product['id'] }}" value="1" <?= $exist_product['addon_product_status'] == true ? 'checked' : '' ?>>
                                    <?php
                                }
                            }
                            if (!$onceGot) {
                                ?>
                                <input type="checkbox" name="addon_product_status{{ $select_product['id'] }}" class="addon_product_status{{ $select_product['id'] }}" id="addon_product_status{{ $select_product['id'] }}" data-id="{{ $select_product['id'] }}" value="1" checked>
                                <?php
                            }
                        } else {
                            ?>
                            <input type="checkbox" name="addon_product_status{{ $select_product['id'] }}" class="addon_product_status{{ $select_product['id'] }}" id="addon_product_status{{ $select_product['id'] }}" data-id="{{ $select_product['id'] }}" value="1" checked>
                            <?php
                        }
                        ?>
                        <span></span>
                    </label>

                </div>        
            </td>
<!--            <td>
                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm" title="{{ translate('Delete') }}">
                    <i class="las la-trash"></i>
                </a>
            </td>-->
        </tr>
        @endforeach
    </tbody>
</table>