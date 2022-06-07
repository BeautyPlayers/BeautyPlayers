<table class="table">
    <thead>
        <tr>
            <th>Service Name</th>
            <th>Maximum Service Count</th>
            <th>Price</th>
            <!--<th>Delete</th>-->
        </tr>
    </thead>
    <tbody>
        @foreach($select_products as $key => $product)
        <tr>
            <td>
                {{ $product['name'] }}
                @if($product['brand'])
                <br><small>Brand: {{ $product['brand']['name'] }}</small>
                @endif
            </td>
            <td>
                <div class="number service-qty">
                    <span class="minus">-</span>
                    <?php
                    if (count($exist_select_products)) {
                        $onceGot = false;
                        foreach ($exist_select_products as $exist_product) {
                            if ($product['id'] == $exist_product['product_id']) {
                                $onceGot = true;
                                ?>
                                <input type="number" name="quantity[]" class="quantity{{ $product['id'] }}" id="quantity{{ $product['id'] }}" data-id="{{ $product['id'] }}" placeholder="1" value="{{ $exist_product['min_qty'] }}" min="{{ $product['min_qty'] }}" max="10" onchange="updateQuantity(this)">
                                <?php
                            }
                        }
                        if (!$onceGot) {
                            ?>
                            <input type="number" name="quantity[]" class="quantity{{ $product['id'] }}" id="quantity{{ $product['id'] }}" data-id="{{ $product['id'] }}" placeholder="1" value="1" min="{{ $product['min_qty'] }}" max="10" onchange="updateQuantity(this)">
                            <?php
                        }
                    } else {
                        ?>
                        <input type="number" name="quantity[]" class="quantity{{ $product['id'] }}" id="quantity{{ $product['id'] }}" data-id="{{ $product['id'] }}" placeholder="1" value="1" min="{{ $product['min_qty'] }}" max="10" onchange="updateQuantity(this)">
                        <?php
                    }
                    ?>
                    <span class="plus">+</span>
                </div>        
            </td>
            <td>{{translate('₹')}}<span class="unit_prices uPrice-{{ $product['id'] }}">{{ $product['unit_price'] }}</span></td>
<!--            <td>
                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm" title="{{ translate('Delete') }}">
                    <i class="las la-trash"></i>
                </a>
            </td>-->
        </tr>
        @endforeach
    </tbody>
</table>