<link rel="stylesheet" type="text/css" href="/admin/src/assets/css/light/forms/switches.css">
<link rel="stylesheet" type="text/css" href="/admin/src/assets/css/dark/forms/switches.css">
<div class="col-lg-4 col-12  layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>ساخت کشور</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">

                <div class="form-group mb-4">
                    <label for="product">کد محصول مورد نظر</label>
                    <input type="search" class="form-control" wire:model.live.debuns.300ms="search" placeholder="Search..." aria-controls="blog-list"></label>
                    <select class="form-select mt-2" id="product" name="product" wire:model="product">
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->p_code}}</option>
                        @endforeach
                    </select>
                    @error('product')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror
                </div>

                <div class="form-group mb-4">
                    <label for="product">فروشکا مورد نظر</label>
                    <input type="search" class="form-control" wire:model.live.debuns.300ms="searchSeller" placeholder="Search..." aria-controls="blog-list"></label>
                    <select class="form-select mt-2" id="seller" name="seller" wire:model="seller">
                        @foreach($sellers as $seller)
                            <option value="{{$seller->id}}">{{$seller->shop_name}}</option>
                        @endforeach
                    </select>
                    @error('seller')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror
                </div>

                <div class="form-group mb-4">
                    <label for="price">قیمت محصول</label>
                    <input type="text" class="form-control" id="price" wire:model="price" name="price" oninput="formatNumber(this)">
                    @error('price')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror
                </div>

                <div class="form-group mb-4">
                    <label for="stock">تعداد محصول</label>
                    <input type="text" class="form-control" id="stock" wire:model="stock" name="stock">
                    @error('stock')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror
                </div>

                <div class="form-group mb-4">
                    <label for="discount">درصد تخفیف</label>
                    <input type="text" class="form-control" id="discount" wire:model="discount" name="discount">
                </div>

                <div class="form-group mb-4">
                    <label for="sale-price">تاریخ انقضا</label>
                    <input type="date"  name="discount_duration" wire:model="discount_duration" class="form-control" id="sale-price" >
                </div>

                <div class="form-group mb-4">
                    <div class="switch form-switch-custom switch-inline form-switch-secondary">
                        <input class="switch-input" type="checkbox" name="featured"  wire:model="featured" role="switch"  id="in-stock">
                        <label class="switch-label" for="in-stock">کالای ویژه</label>
                    </div>
                </div>

                <button class="btn btn-info mb-2 me-4" type="submit"> ذخیره</button>
            </form>
        </div>
    </div>
</div>
<script>
    function formatNumber(input) {
        // فقط اعداد را نگه می‌داریم
        let value = input.value.replace(/\D/g, '');
        // سه‌رقمی جدا کردن با کاما
        input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
</script>
