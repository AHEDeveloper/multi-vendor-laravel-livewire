<div>
    <div class="modal-header" id="inputFormModalLabel">
        <h5 class="modal-title">ساخت ادمین جدید</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>
    <div class="modal-body">
        @if(session()->has('message'))
            <div class="alert alert-success fs-5">
                {{session('message')}}
            </div>
        @endif
        <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))" class="mt-0">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name" wire:model="name">
                </div>
                @error('name')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror

            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile" wire:model="mobile">
                </div>
                @error('mobile')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><polyline points="3 7 12 13 21 7"></polyline></svg></span>
                    <input type="text" class="form-control" name="email" placeholder="Email" aria-label="email" wire:model="email">
                </div>
                @error('email')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror
            </div>
            <div class="col-xxl-12 col-md-6 mb-4">
                <label for="category">نقش ها</label>
                <select class="form-select" id="category" name="selectedRoles" wire:model="selectedRoles" multiple>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                @error('selectedRoles')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror
            </div>
            <div class="col-xxl-12 col-md-6 mb-4">
                <label for="category">دسترسی ها</label>
                <select class="form-select" id="category" name="selectedPermissions" wire:model="selectedPermissions" multiple>
                    @foreach($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                    @endforeach
                </select>
                @error('selectedPermissions')<div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button><strong>خطا!</strong>{{$message}}</button></div>@enderror
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" >ذخیره</button>
            </div>
        </form>
    </div>

</div>
