<div class="col-xxl-12 col-xl-8 col-lg-8 col-md-7 mt-xxl-0 mt-4">
    <div class="widget-content widget-content-area ecommerce-create-section">
        <div class="row">
            <div class="col-xxl-12 col-md-6 mb-4">
                <label for="proCode">قیمت محصول</label>
                <input type="text" class="form-control" id="proCode" name="price" wire:model="price">
                @error('price')
                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong>{{$message}}</button>
                </div>
                @enderror
            </div>
            <div class="col-xxl-12 col-md-6 mb-4">
                <label for="proSKU">موجودی محصول</label>
                <input type="text" class="form-control" id="proSKU" name="stock" wire:model="stock">
                @error('stock')
                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong>{{$message}}</button>
                </div>
                @enderror
            </div>
            <div class="col-xxl-12 col-md-6 mb-4">
                <label for="category">فروشگاه</label>
                <select class="form-select" id="category" name="seller" wire:model="seller">
                    @foreach($sellers as $seller)
                        <option value="{{$seller->id}}">{{$seller->shop_name}}</option>
                    @endforeach
                </select>
                @error('seller')
                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong>{{$message}}</button>
                </div>
                @enderror
            </div>
            <div class="col-xxl-12 col-md-6 mb-4">
                <label for="gender">دسته بندی</label>
                <select class="form-select" id="gender" name="category" wire:model="category">
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category')
                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong>{{$message}}</button>
                </div>
                @enderror
            </div>
        </div>
    </div>
</div>
