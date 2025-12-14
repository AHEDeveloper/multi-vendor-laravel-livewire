<div class="col-xxl-12 col-xl-4 col-lg-4 col-md-5 mt-4">
    <div class="widget-content widget-content-area ecommerce-create-section">
        <div class="row">
            <div class="col-sm-12 mb-4">
                <label for="regular-price">کد تخفیف</label>
                <input type="text" name="discount" wire:model="discount" class="form-control" id="regular-price" >
                @error('discount')
                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong>{{$message}}</button>
                </div>
                @enderror
            </div>
            <div class="col-sm-12 mb-4">
                <label for="sale-price">تاریخ انقضا</label>
                <input type="date"  name="discount_duration" wire:model="discount_duration" class="form-control" id="sale-price" value="{{ @$product->discount_duration }}">
                @error('discount_duration')
                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong>{{$message}}</button>
                </div>
                @enderror
            </div>

            <div class="col-xxl-12 mb-4">
                <div class="switch form-switch-custom switch-inline form-switch-secondary">
                    <input class="switch-input" type="checkbox" name="featured" wire:model="featured" role="switch"  id="in-stock">
                    @error('featured')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                    <label class="switch-label" for="in-stock">کالای ویژه</label>
                </div>
            </div>

            <div class="col-sm-12">
                <button class="btn btn-success w-100 _effect--ripple waves-effect waves-light">ذخیره
                </button>
            </div>
        </div>
    </div>
</div>
