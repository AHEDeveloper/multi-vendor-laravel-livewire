<div class="col-lg-4 col-12  layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>ساخت کد تخفیف</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">کد تخفیف</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" wire:model="code" name="code">
                    @error('code')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">تایپ قیمتی</label>
                    <select class="form-select" id="type" >
                        <option value="percent">تومان</option>
                        <option value="fixed">ریال</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">مبلغ تخفیف</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" wire:model="value" name="value">
                    @error('value')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">تعداد برای استفاده کردن </label>
                    <input type="number" class="form-control" id="formGroupExampleInput" wire:model="limit" name="limit">
                    @error('limit')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">مبلغ حداقل خریدها</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" wire:model="min_purches" name="min_purches">
                    @error('min_purchase')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">تاریخ انقضا کد</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" wire:model="expires_at" name="expires_at">
                    @error('expires_at')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">کابران</label>
                    <select class="form-select" id="type" >
                        <option value="percent">تومان</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">فعال/غیر فعال</label>
                    <input class="form-check-input me-1" type="checkbox" wire:model="expires_at" name="expires_at" checked>
                    @error('expires_at')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>


                <button class="btn btn-info mb-2 me-4 mt-2" type="submit"> ذخیره</button>

            </form>
        </div>
    </div>
</div>
