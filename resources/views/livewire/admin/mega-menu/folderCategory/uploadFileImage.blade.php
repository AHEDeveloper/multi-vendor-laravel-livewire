<div
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false; progress = 100"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress.window="progress = $event.detail.progress"
    class="form-group mb-4"
>
    <label for="product-images">آپلود عکس</label>
    <div class="field-wrapper">
        <input id="product-images" class="form-control" type="file" wire:model.live="photo" />
        <div x-show="isUploading" class="mt-3" style="display:none;">
            <div class="progress br-30" role="progressbar" aria-label="File upload progress" aria-valuemin="0" aria-valuemax="100" :aria-valuenow="progress">
                <div
                    class="progress-bar bg-gradient-primary"
                    role="progressbar"
                    :style="`width: ${progress}%`"
                    x-text="Math.round(progress) + '%'"
                ></div>
            </div>
        </div>
        @error('photo')
        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>خطا!</strong> {{ $message }}
        </div>
        @enderror
    </div>
</div>
