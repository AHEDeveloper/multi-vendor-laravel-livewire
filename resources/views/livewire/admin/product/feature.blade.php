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
                                <li class="breadcrumb-item active" aria-current="page">ویژگی محصول</li>
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
        <div class="statebox widget box box-shadow">

            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">

                @foreach($features as $feature)
                    @foreach($feature->categoryFeatureDetail as $index=>$detail)
                        <div class="row">
                            <div class="col-md-2">
                                <h6>{{$detail->name}}</h6>
                            </div>

                            <div class="col-md-6">
                                <select class="form-select mb-3" id="value" name="featureDetailValueId[{{$loop->index}}]">
                                    @foreach($detail->featureDetailValue as $value)
                                        <option value="{{$feature->id}}_{{$detail->id}}_{{$value->id}}">{{$value->value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                @endforeach


                <div class="col-sm-12 text-left">
                    <button class="btn btn-success _effect--ripple waves-effect waves-light">
                        <span wire:loading.remove>ذخیره کردن</span>
                        <div wire:loading class="spinner-border text-white me-2 align-self-center loader-sm "></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
