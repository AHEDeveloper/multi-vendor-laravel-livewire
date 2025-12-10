<div class="col-lg-4 col-12  layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>ساخت دسته بندی</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">

                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">نام دسته بندی</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" wire:model="name" name="name">
                    @error('name')
                    <div wire:loading.remove
                         class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="gender">دسته والد</label>
                    <select class="form-select" id="gender" wire:model="parent" name="parent">
                        <option value="">لطفا یک دسته بندی انتخاب کنید:</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('parent')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا!</strong>{{$message}}</button>
                    </div>
                    @enderror
                </div>

                @include('livewire.admin.category.createCategory.uploadFileImage')


                <div class="form-group mb-4">
                    <div class="d-flex flex-wrap">
                        <div class="item w-25 m-2 ">
                            @if($photo)
                                @if(in_array($photo->getMimeType(),['image/jpg','image/png','image/jpeg','image/webp','image/gif']))
                                    <img src="{{$photo->temporaryURL()}}" class="w-100 rounded">
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                @if(@$categoryEdit->image)
                    <div class="form-group mb-4">
                        <div class="d-flex flex-wrap">
                            <div class="item w-25 m-2 ">
                                <label for="product-images">عکس موجود</label>
                                <img src="/categorys/{{$categoryEdit->id}}/small/{{$categoryEdit->image->path}}" class="w-100 rounded">
                            </div>
                        </div>
                    </div>
                @endif



                <button class="btn btn-info mb-2 me-4" type="submit">ذخیره</button>

            </form>
        </div>
    </div>
</div>
