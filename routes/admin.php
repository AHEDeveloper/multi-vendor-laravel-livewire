<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use \App\Livewire\Admin\Country\Index as CountryIndex;
use \App\Livewire\Admin\State\Index as StateIndex;
use \App\Livewire\Admin\City\Index as CityIndex;
use \App\Livewire\Admin\Product\Index as ProductIndex;
use \App\Livewire\Admin\Product\Create as ProductCreate;
use \App\Livewire\Admin\Product\Feature as ProductFeature;
use \App\Livewire\Admin\Product\Content as ProductContent;
use \App\Livewire\Admin\Product\Filter as ProductFilter;
use \App\Livewire\Admin\ProductSeller\Index as ProductSellerIndex;
use \App\Livewire\Admin\Category\Index as CategoryIndex;
use \App\Livewire\Admin\Category\Feature as CategoryFeature;
use \App\Livewire\Admin\Category\Detail as CategoryDetail;
use \App\Livewire\Admin\Category\Value as CategoryValue;
use \App\Livewire\Admin\MegaMenu\Index as MegaMenuIndex;
use \App\Livewire\Admin\MegaMenu\Feature as MegaMenuFeature;
use \App\Livewire\Admin\MegaMenu\Value as MegaMenuValue;
use \App\Livewire\Admin\Weblog\Index as WeblogIndex;
use \App\Livewire\Admin\Weblog\Create as WeblogCreate;
use \App\Livewire\Admin\Weblog\Category as WeblogCategory;
use \App\Livewire\Admin\AdminUser\Index as AdminIndex;
use \App\Livewire\Admin\Seller\Index as SellerIndex;
use \App\Livewire\Admin\Order\Index as OrderIndex;
use \App\Livewire\Admin\Order\Detail as OrderDetail;
use \App\Livewire\Admin\DeliveryMethod\Index as DeliveryMethodIndex;
use \App\Livewire\Admin\PaymentMethod\Index as PaymentMethodIndex;
use \App\Livewire\Admin\Coupon\Index as CouponIndex;
use \App\Livewire\Admin\Slide\Index as SlideIndex;
use \App\Livewire\Admin\Auth\Index as AuthIndex;

Route::name('admin.')->group(function () {
    Route::get('/auth', AuthIndex::class)->name('auth.login')->middleware('guest:admin');
    Route::get('/logout', [AuthIndex::class, 'logout'])->name('auth.logout')->middleware('auth:admin');
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', DashboardIndex::class)->name('dashboard.index')->middleware(['role:super admin|product admin']);
        Route::get('/country', CountryIndex::class)->name('country.index');
        Route::get('/state', StateIndex::class)->name('state.index');
        Route::get('/city', CityIndex::class)->name('city.index');

        Route::get('/product', ProductIndex::class)->name('product.index');
        Route::get('/product/create', ProductCreate::class)->name('product.create');
        Route::get('/product/{product}/feature', ProductFeature::class)->name('product.feature');
        Route::get('/product/{product}/content', ProductContent::class)->name('product.content');
        Route::get('/product/{product}/filter', ProductFilter::class)->name('product.filter');
        Route::post('/product/{productId}/CKeditor', [\App\Livewire\Admin\Product\CKeditor::class, 'upload'])->name('product.ckeditor');
        Route::get('/product-seller', ProductSellerIndex::class)->name('product-seller.index');

        Route::get('/category', CategoryIndex::class)->name('category.index');
        Route::get('/{category}/feature', CategoryFeature::class)->name('feature.index');
        Route::get('/category/{feature}/detail', CategoryDetail::class)->name('detail.index');
        Route::get('/category/feature/{detail}/value', CategoryValue::class)->name('value.index');

        Route::get('/menu/category', MegaMenuIndex::class)->name('menu.index');
        Route::get('/menu/{category}/feature', MegaMenuFeature::class)->name('menu.ّّّfeature');
        Route::get('/menu/category/{feature}/value', MegaMenuValue::class)->name('menu.value');

        Route::get('/weblog', WeblogIndex::class)->name('weblog.index');
        Route::get('/weblog/create', WeblogCreate::class)->name('weblog.create');
        Route::get('/weblog/category', WeblogCategory::class)->name('weblog.category');

        Route::get('/admin-user', AdminIndex::class)->name('admin-user.index');
        Route::get('/seller', SellerIndex::class)->name('seller.index');
        Route::get('/order', OrderIndex::class)->name('order.index');
        Route::get('/detail', OrderDetail::class)->name('order.detail');
        Route::get('/delivery', DeliveryMethodIndex::class)->name('delivery.index');
        Route::get('/payment', PaymentMethodIndex::class)->name('payment.index');
        Route::get('/coupon', CouponIndex::class)->name('coupon.index');
        Route::get('/slide', SlideIndex::class)->name('slide.index');

    });
});

