<div class="col-lg-4 col-12  layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>ساخت درگاه پرداخت</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">نام درگاه پرداخت</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" wire:model="name" name="name" >
                    @error('name')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">مرچنت کد</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" wire:model="merchant" name="merchant" >
                    @error('merchant')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">فعال/غیر فعال</label>
                    <input type="checkbox" class="form-check-input me-1" id="formGroupExampleInput" wire:model="is_active" name="is_active" checked>
                    @error('is_active')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>
                <button class="btn btn-info mb-2 me-4" type="submit"> ذخیره</button>
            </form>
        </div>
    </div>
</div>
