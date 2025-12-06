<div class="col-lg-4 col-12  layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>ساخت استان</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">نام استان</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" wire:model="name" name="name">
                    @error('name')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>

                <div class="col-xxl-12 col-md-6 mb-4">
                    <label for="country">کشور</label>
                    <select class="form-select" id="country" name="country" wire:model="country">
                        <option value="">یک کشور انتخاب کن</option>
                       @foreach($countrys as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                       @endforeach
                    </select>
                    @error('country')
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
