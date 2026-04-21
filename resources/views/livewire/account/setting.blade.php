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

    <div>
        <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">{{__('Delete my account')}}</h4>
  <p>{{__('Are you sure you want to delete your account? This action cannot be undone.')}}</p>
  <hr>
  <p class="mb-0">{{__('Once deleted, all your data will be permanently removed.')}}</p>
  <button class="btn btn-danger" wire:click="delete" wire:confirm="{{__('Are you sure you want to delete your account? This action cannot be undone.')}}">{{__('Delete Account')}}</button>
</div>
    </div>
</div>
