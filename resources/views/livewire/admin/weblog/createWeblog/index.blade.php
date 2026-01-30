@push('linkBlog')
    <link rel="stylesheet" href="/admin/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="/admin/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/src/tagify/tagify.css">

    <link rel="stylesheet" type="text/css" href="/admin/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/light/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/light/tagify/custom-tagify.css">
    <link href="/admin/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="/admin/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/dark/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/dark/tagify/custom-tagify.css">
    <link href="/admin/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="/admin/src/assets/css/light/apps/blog-create.css">
    <link rel="stylesheet" href="/admin/src/assets/css/dark/apps/blog-create.css">
    <!--  END CUSTOM STYLE FILE  -->
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
                                    <a href="{{route('admin.weblog.index')}}">وبلاگ ها</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">ساخت وبلاگ</li>
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

            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    @include('livewire.admin.weblog.createWeblog.form')
                    @include('livewire.admin.weblog.createWeblog.seo')
                </div>

            </form>

        </div>
</div>
</div>
