<div class="row">

    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
        <div class="card mt-3 mb-3">
            <div class="card-body">

                <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                    <div class="row">
                        <div class="col-md-12 mb-3">

                            <h2>ورود ادمین</h2>
                            <p>لطفا ایمیل خود و رمز عبور خود را وارد کنید</p>

                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">ایمیل</label>
                                <input type="email" class="form-control" name="email">
                                @error('email')
                                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                    <strong>خطا!</strong>{{$message}}</button>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-4">
                                <label class="form-label">رمز عبور</label>
                                <input type="text" class="form-control" name="password">
                                @error('password')
                                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                    <strong>خطا!</strong>{{$message}}</button>
                                </div>
                                @enderror
                            </div>
                        </div>
                        @if(session()->has('message'))
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="col-12">
                            <div class="mb-4">
                                <button class="btn btn-secondary w-100" type="submit">ثبت</button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
