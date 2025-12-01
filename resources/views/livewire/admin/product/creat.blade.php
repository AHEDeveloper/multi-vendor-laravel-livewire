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

        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="widget-content widget-content-area ecommerce-create-section">

                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label>نام محصول</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label>اسلاگ</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label>meta_title</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label>meta_description</label>
                            <textarea name="meta_description" class="form-control"  cols="10" rows="5"></textarea>
                        </div>
                    </div>



                </div>
                <div class="widget-content widget-content-area ecommerce-create-section mt-2">
                    <div class="col-md-12">
                        <label for="product-images">اپلود عکس</label>
                        <div class="field-wrapper">

                            <input class="form-control" type="file"  multiple>


                        </div>
{{--                        <div class="d-flex flex-wrap">--}}
{{--                                    <div class="item w-25 m-2 ">--}}
{{--                                        <img src="" class="w-100 rounded">--}}
{{--                                        <div class="d-flex justify-content-between align-items-center mt-2 bg-dark p-2 rounded">--}}
{{--                                            <div class="form-check form-check-primary form-check-inline">--}}
{{--                                                <input type="radio" id="cover-image" class="form-check-input" name="cover-image">--}}

{{--                                                <label for="cover-image" class="text-white">به عنوان کاور</label>--}}
{{--                                            </div>--}}
{{--                                            <a href="javascript:0" class="action-btn text-danger btn-delete bs-tooltip">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                width="24" height="24"--}}
{{--                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"--}}
{{--                                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">--}}
{{--                                                    <polyline points="3 6 5 6 21 6"></polyline>--}}
{{--                                                    <path--}}
{{--                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">--}}
{{--                                                    </path>--}}
{{--                                                    <line x1="10" y1="11" x2="10" y2="17"></line>--}}
{{--                                                    <line x1="14" y1="11" x2="14" y2="17"></line>--}}
{{--                                                </svg>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="col-xxl-12 col-xl-8 col-lg-8 col-md-7 mt-xxl-0 mt-4">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row">
                            <div class="col-xxl-12 col-md-6 mb-4">
                                <label for="proCode">قیمت محصول</label>
                                <input type="text" class="form-control" id="proCode" value="">
                            </div>
                            <div class="col-xxl-12 col-md-6 mb-4">
                                <label for="proSKU">موجودی محصول</label>
                                <input type="text" class="form-control" id="proSKU" value="">
                            </div>
                            <div class="col-xxl-12 col-md-6 mb-4">
                                <label for="gender">فروشنده</label>
                                <select class="form-select" id="gender">
                                    <option value="">امیر</option>
                                </select>
                            </div>
                            <div class="col-xxl-12 col-md-6 mb-4">
                                <label for="category">دسته بندی</label>
                                <select class="form-select" id="category">
                                    <option value="">سامسونگ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-xl-4 col-lg-4 col-md-5 mt-4">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <label for="regular-price">کد تخفیف</label>
                                <input type="text" class="form-control" id="regular-price" value="">
                            </div>
                            <div class="col-sm-12 mb-4">
                                <label for="sale-price">تاریخ انقضا</label>
                                <input type="date"  name="discount_duration" class="form-control" id="sale-price" value="{{ @$product->discount_duration }}">
                            </div>

                            <div class="col-xxl-12 mb-4">
                                <div class="switch form-switch-custom switch-inline form-switch-secondary">
                                    <input class="switch-input" type="checkbox" name="featured" role="switch" value="" id="in-stock">
                                    <label class="switch-label" for="in-stock">کالای ویژه</label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button class="btn btn-success w-100 _effect--ripple waves-effect waves-light">Add
                                    Product
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
