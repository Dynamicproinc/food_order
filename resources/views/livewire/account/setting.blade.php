<div>
    <div>
        <form wire:submit="update">
            <div class="form-group">
                <label for="">{{ __('First Name') }}</label>
                <input type="text" class="form-control" wire:model="first_name">
            </div>
            <div class="form-group mb-3">
                <label for="">{{ __('Last Name') }}</label>
                <input type="text" class="form-control" wire:model="last_name">
            </div>
            <div class="form-group d-flex flex-row-reverse mb-3">
                <button class="btn btn-warning" wire:loading.attr="disabled">{{ __('Update') }}</button>
            </div>
            @if (session('success'))
                <span class="text-success">{{ session('success') }}</span>
            @endif
            @error('general')
                <span class="text-danger">{{ $message }}</span>
            @enderror


        </form>
    </div>
</div>
