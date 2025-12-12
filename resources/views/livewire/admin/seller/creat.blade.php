<div>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header" id="inputFormModalLabel" >
                <h5 class="modal-title">ساخت فروشنده جدید</h5>
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

            <div class="modal-body" >
                <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))" class="mt-0">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="نام فروشنده" name="name" wire:model="name">
                        </div>
                        @error('name')
                        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...</svg></button><strong>خطا!</strong>{{$message}}</button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="نام فروشگاه" name="shop_name" wire:model="shop_name">
                        </div>
                        @error('shop_name')
                        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...</svg></button><strong>خطا!</strong>{{$message}}</button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="موبایل" name="mobile" wire:model="mobile">
                        </div>
                        @error('mobile')
                        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...</svg></button><strong>خطا!</strong>{{$message}}</button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><polyline points="3 7 12 13 21 7"></polyline></svg></span>
                            <input type="text" class="form-control" placeholder="ایمیل" aria-label="email" name="email" wire:model="email">
                        </div>
                        @error('email')
                        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...</svg></button><strong>خطا!</strong>{{$message}}</button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="5" y="11" width="14" height="10" rx="2"></rect><circle cx="12" cy="16" r="1"></circle><path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                    </svg>
                                </span>
                            <input type="password" class="form-control" placeholder="رمز عبور" aria-label="password" name="password" wire:model="password">
                        </div>
                        @error('password')
                        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...</svg></button><strong>خطا!</strong>{{$message}}</button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <textarea id="" cols="3" rows="3" class="form-control" placeholder="ادرس فروشنده" name="address" wire:model="address"></textarea>
                        </div>
                        @error('address')
                        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...</svg></button><strong>خطا!</strong>{{$message}}</button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <textarea id="" cols="3" rows="3" class="form-control" placeholder="توضیحات(اختیاری)" name="description" wire:model="description"></textarea>
                        </div>
                        @error('description')
                        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...</svg></button><strong>خطا!</strong>{{$message}}</button>
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" >
                        ذخیره
                    </button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">
                    بستن مدال
                </button>
            </div>

        </div>
    </div>
</div>
