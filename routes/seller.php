<?php

use App\Http\Controllers\AizUploadController;
use App\Http\Controllers\Seller\AddressController;
use App\Http\Controllers\Seller\CouponController;
use App\Http\Controllers\Seller\ShopController;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\ProductBulkUploadController;
use App\Http\Controllers\Seller\DigitalProductController;
use App\Http\Controllers\Seller\InvoiceController;
use App\Http\Controllers\Seller\OrderController;
use App\Http\Controllers\Seller\PaymentController;
use App\Http\Controllers\Seller\ProfileController;
use App\Http\Controllers\Seller\ReviewController;
use App\Http\Controllers\Seller\SellerWithdrawRequestController;
use App\Http\Controllers\Seller\CommissionHistoryController;
use App\Http\Controllers\Seller\ConversationController;
use App\Http\Controllers\Seller\NotificationController;
use App\Http\Controllers\Seller\SupportTicketController;

Route::group(['prefix' => 'seller', 'middleware' => ['seller', 'verified', 'user'], 'as' => 'seller.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Product 
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('products');
        Route::get('/product/create', 'create')->name('products.create');
        Route::post('/products/store/', 'store')->name('products.store');
        Route::get('/product/{id}/edit', 'edit')->name('products.edit');
        Route::post('/products/update/{product}', 'update')->name('products.update');
        Route::get('/products/duplicate/{id}', 'duplicate')->name('products.duplicate');
        Route::post('/products/sku_combination', 'sku_combination')->name('products.sku_combination');
        Route::post('/products/sku_combination_edit', 'sku_combination_edit')->name('products.sku_combination_edit');
        Route::post('/products/add-more-choice-option', 'add_more_choice_option')->name('products.add-more-choice-option');
        Route::post('/products/seller/featured', 'updateFeatured')->name('products.featured');
        Route::post('/products/published', 'updatePublished')->name('products.published');
        Route::get('/products/destroy/{id}', 'destroy')->name('products.destroy');
        Route::post('products/bulk-delete', 'delete_bulk_product')->name('bulk-product-delete');
    });

    // Product Bulk Upload
    Route::controller(ProductBulkUploadController::class)->group(function () {
        Route::get('/product-bulk-upload/index', 'index')->name('product_bulk_upload.index');
        Route::post('/product-bulk-upload/store', 'bulk_upload')->name('bulk_product_upload');
        Route::group(['prefix' => 'bulk-upload/download'], function() {
            Route::get('/category', 'App\Http\Controllers\ProductBulkUploadController@pdf_download_category')->name('pdf.download_category');
            Route::get('/brand', 'App\Http\Controllers\ProductBulkUploadController@pdf_download_brand')->name('pdf.download_brand');
        });
    });

    // Digital Product
    Route::controller(DigitalProductController::class)->group(function () {
        Route::get('/digitalproducts', 'index')->name('digitalproducts');
        Route::get('/digitalproducts/create', 'create')->name('digitalproducts.create');
        Route::post('/digitalproducts/store', 'store')->name('digitalproducts.store');
        Route::get('/digitalproducts/{id}/edit', 'edit')->name('digitalproducts.edit');
        Route::post('/digitalproducts/update/{id}', 'update')->name('digitalproducts.update');
        Route::get('/digitalproducts/destroy/{id}', 'destroy')->name('digitalproducts.destroy');
        Route::get('/digitalproducts/download/{id}', 'download')->name('digitalproducts.download');
    });

    //Upload
    Route::controller(AizUploadController::class)->group(function () {
        Route::any('/uploads', 'index')->name('uploaded-files.index');
        Route::any('/uploads/create', 'create')->name('uploads.create');
        Route::any('/uploads/file-info', 'file_info')->name('my_uploads.info');
        Route::get('/uploads/destroy/{id}', 'destroy')->name('my_uploads.destroy');
    });

    //Coupon
    Route::resource('coupon', CouponController::class);
    Route::controller(CouponController::class)->group(function () {
        Route::post('/coupon/get_form', 'get_coupon_form')->name('coupon.get_coupon_form');
        Route::post('/coupon/get_form_edit', 'get_coupon_form_edit')->name('coupon.get_coupon_form_edit');
        Route::get('/coupon/destroy/{id}', 'destroy')->name('coupon.destroy');
    });

    //Order
    Route::resource('orders', OrderController::class);
    Route::controller(OrderController::class)->group(function () {
        Route::post('/orders/update_delivery_status', 'update_delivery_status')->name('orders.update_delivery_status');
        Route::post('/orders/update_payment_status', 'update_payment_status')->name('orders.update_payment_status');
    });
    Route::get('invoice/{order_id}',[InvoiceController::class, 'invoice_download'])->name('invoice.download');

    //Review
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');

    //Shop
    Route::controller(ShopController::class)->group(function () {
        Route::get('/shop', 'index')->name('shop.index');
        Route::post('/shop/update', 'update')->name('shop.update');
        Route::get('/shop/apply_for_verification', 'verify_form')->name('shop.verify');
        Route::post('/shop/verification_info_store', 'verify_form_store')->name('shop.verify.store');
    });

    //Payments
    Route::resource('payments', PaymentController::class);

    // Profile Settings
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.index');
        Route::post('/profile/update/{id}', 'update')->name('profile.update');
    });

    // Address
    Route::resource('addresses', AddressController::class);
    Route::controller(AddressController::class)->group(function () {
        Route::post('/get-states', 'getStates')->name('get-state');
        Route::post('/get-cities', 'getCities')->name('get-city');
        Route::post('/address/update/{id}', 'update')->name('addresses.update');
        Route::get('/addresses/destroy/{id}', 'destroy')->name('addresses.destroy');
        Route::get('/addresses/set_default/{id}', 'set_default')->name('addresses.set_default');
    });

    // Money Withdraw Requests
    Route::controller(SellerWithdrawRequestController::class)->group(function () {
        Route::get('/money-withdraw-requests', 'index')->name('money_withdraw_requests.index');
        Route::post('/money-withdraw-request/store', 'store')->name('money_withdraw_request.store');
    });

    // Commission History
    Route::get('commission-history', [CommissionHistoryController::class, 'index'])->name('commission-history.index');

    //Conversations 
    Route::controller(ConversationController::class)->group(function () {
        Route::get('/conversations', 'index')->name('conversations.index');
        Route::get('/conversations/show/{id}', 'show')->name('conversations.show');
        Route::post('conversations/refresh', 'refresh')->name('conversations.refresh');
        Route::post('conversations/message/store', 'message_store')->name('conversations.message_store');
    });

    // Support Ticket
    Route::controller(SupportTicketController::class)->group(function () {
        Route::get('/support_ticket', 'index')->name('support_ticket.index');
        Route::post('/support_ticket/store', 'store')->name('support_ticket.store');
        Route::get('/support_ticket/show/{id}', 'show')->name('support_ticket.show');
        Route::post('/support_ticket/reply', 'ticket_reply_store')->name('support_ticket.reply_store');
    });

    // Notifications
    Route::get('all-notification', [NotificationController::class, 'index'])->name('all-notification');
});

