<div class="widget-content widget-content-area ecommerce-create-section">

    <div class="row mb-4">
        <div class="col-sm-12">
            <label>نام محصول</label>
            <input type="text" name="name" wire:model.live.debuns.300ms="name"  class="form-control">
            @error('name')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                <strong>خطا!</strong>{{$message}}</button>
            </div>
            @enderror
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-12">
            <label>اسلاگ</label>
            <input type="text" name="slug" wire:model="slug" class="form-control" readonly>
            @error('slug')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                <strong>خطا!</strong>{{$message}}</button>
            </div>
            @enderror
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-12">
            <label>meta_title</label>
            <input type="text" name="meta_title" wire:model="meta_title" class="form-control">
            @error('meta_title')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                <strong>خطا!</strong>{{$message}}</button>
            </div>
            @enderror
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-12">
            <label>meta_description</label>
            <textarea name="meta_description" wire:model="meta_description" class="form-control"  cols="10" rows="5"></textarea>
            @error('meta_description')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                <strong>خطا!</strong>{{$message}}</button>
            </div>
            @enderror
        </div>
    </div>



</div>
