@push('productCreateLinks')
    <link rel="stylesheet" type="text/css" href="/admin/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/assets/css/dark/forms/switches.css">
@endpush
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
                                <li class="breadcrumb-item active" aria-current="page">ساخت محصول</li>
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
        <div class="row mb-4 layout-spacing layout-top-spacing">
            {{--                @if ($errors->any())--}}
            {{--                    <div>--}}
            {{--                        <ul>--}}
            {{--                            @foreach ($errors->all() as $error)--}}
            {{--                                <li>{{ $error }}</li>   متن خطا--}}
            {{--                            @endforeach--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                @endif--}}
            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))" class="row">
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                    <div class="row">
                        @include('livewire.admin.product.createProduct.name-slug-meta')
                        @include('livewire.admin.product.createProduct.image')
                    </div>

                </div>

                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        @include('livewire.admin.product.createProduct.price-stock-category')
                        @include('livewire.admin.product.createProduct.discount-fetured')

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('productCreateJs')
    <script src="/admin/src/plugins/src/tagify/tagify.min.js"></script>

    <script src="/admin/src/assets/js/apps/blog-create.js"></script>
@endpush
