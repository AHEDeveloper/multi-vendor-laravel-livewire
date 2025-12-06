<div>
    <div class="modal fade inputForm-modal" id="inputFormModal" tabindex="-1" role="dialog"
         aria-labelledby="inputFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header" id="inputFormModalLabel">
                    <h5 class="modal-title">ساخت کد تخفیف جدید</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-hidden="true">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <div class="modal-body">
                    <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">کد تخفیف</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" wire:model="code" name="code">
                            @error('code')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!</strong>{{$message}}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">تایپ قیمتی</label>
                            <select class="form-select" id="type" >
                                <option value="percent">تومان</option>
                                <option value="fixed">ریال</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">مبلغ تخفیف</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" wire:model="value" name="value">
                            @error('value')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!</strong>{{$message}}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">تعداد برای استفاده کردن </label>
                            <input type="number" class="form-control" id="formGroupExampleInput" wire:model="limit" name="limit">
                            @error('limit')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!</strong>{{$message}}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">مبلغ حداقل خریدها</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" wire:model="min_purches" name="min_purches">
                            @error('min_purchase')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!</strong>{{$message}}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">تاریخ انقضا کد</label>
                            <input type="date" class="form-control" id="formGroupExampleInput" wire:model="expires_at" name="expires_at">
                            @error('expires_at')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!</strong>{{$message}}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">کابران</label>
                            <select class="form-select" id="type" >
                                <option value="percent">تومان</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="formGroupExampleInput">فعال/غیر فعال</label>
                            <input class="form-check-input me-1" type="checkbox" wire:model="expires_at" name="expires_at" checked>
                            @error('expires_at')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!</strong>{{$message}}</button>
                            </div>
                            @enderror
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">ذخیره</button>
                </div>

            </div>
        </div>
    </div>
</div>
