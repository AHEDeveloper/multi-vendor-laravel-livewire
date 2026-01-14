<div>
    <div class="secondary-nav">
        <div class="breadcrumbs-container" data-page-heading="Sales">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse"
                   data-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>
                <div class="d-flex breadcrumb-content">
                    <div class="page-header">

                        <div class="page-title">
                        </div>

                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard.index')}}">داشبورد</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.product.index')}}">محصولات</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">ساخت محتوا</li>
                            </ol>
                        </nav>

                    </div>
                </div>
                <ul class="navbar-nav flex-row ms-auto breadcrumb-action-dropdown">
                    <li class="nav-item more-dropdown">
                        <div class="dropdown  custom-dropdown-icon">
                            <livewire:admin.drop-down-header/>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
    </div>
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>مدریت محتوا محصول <span style="color: grey">{{$productName}}</span></h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>   متن خطا
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                        <div class="form-group mb-4">

                            <label for="exampleFormControlTextarea1">معرفی کالا</label>
                            <textarea class="form-control" name="short_description" wire:model="shortDescription" id="exampleFormControlTextarea1" rows="9"></textarea>
                            @error('short_description')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror

                        </div>
                        <div class="form-group mb-4" wire:ignore>

                            <label for="long_description">توضیحات تخصصی</label>
                            <textarea class="form-control" id="editor1" name="long_description" wire:model="longDescription"  rows="500"></textarea>

                        </div>
                        @error('long_description')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror

                        <button type="submit" class="btn btn-success w-10 _effect--ripple waves-effect waves-light">ثبت محتوا</button>
                    </form>
                </div>
            </div>
            @push('productContentJs')
                <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
                <script>
                    document.addEventListener('livewire:init',() => {
                        const editor = CKEDITOR.replace('editor1',{
                            filebrowserUploadUrl: "{{route('admin.product.ckeditor', [$product->id,'_token' => csrf_token() ])}}",
                            filebrowserUploadMethod: 'form',
                            contentsLangDirection: 'rtl' ,
                            height: 500
                        })
                        editor.on('change',function (event){
                            console.log(event.editor.getData())
                        @this.set('longDescription',event.editor.getData())
                        })
                    })
                </script>
            @endpush
        </div>
    </div>
</div>
