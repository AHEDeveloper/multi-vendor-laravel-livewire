@push('productCreateLinks')
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
@endpush
<div>
    <div class="row mb-4 layout-spacing layout-top-spacing">
        {{--        @if ($errors->any())--}}
        {{--            <div>--}}
        {{--                <ul>--}}
        {{--                    @foreach ($errors->all() as $error)--}}
        {{--                        <li>{{ $error }}</li>   متن خطا--}}
        {{--                    @endforeach--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--        @endif--}}
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
@push('productCreateJs')
    <script src="/admin/src/plugins/src/editors/quill/quill.js"></script>
    <script src="/admin/src/plugins/src/filepond/filepond.min.js"></script>
    <script src="/admin/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="/admin/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="/admin/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="/admin/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="/admin/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="/admin/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="/admin/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>

    <script src="/admin/src/plugins/src/tagify/tagify.min.js"></script>

    <script src="/admin/src/assets/js/apps/blog-create.js"></script>
@endpush
