<div>
    <div class="container mt-4 mb-5">
    <h3>Add New Coupon</h3>

    @if($message)
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <form wire:submit.prevent="saveCoupon">
        <div class="mb-3">
            <label class="form-label">Coupon Code</label>
            <input type="text" class="form-control" wire:model.defer="code">
            @error('code') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" wire:model.defer="description"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Discount Type</label>
            <select class="form-select" wire:model.defer="discount_type">
                <option value="">-- Select Type --</option>
                <option value="percentage">Percentage</option>
                <option value="fixed">Fixed Amount</option>
            </select>
            @error('discount_type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Discount Value</label>
            <input type="number" class="form-control" wire:model.defer="discount_value" step="0.01">
            @error('discount_value') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Max Discount Amount</label>
            <input type="number" class="form-control" wire:model.defer="max_discount_amount" step="0.01">
        </div>

        <div class="mb-3">
            <label class="form-label">Minimum Order Amount</label>
            <input type="number" class="form-control" wire:model.defer="min_order_amount" step="0.01">
        </div>

        <div class="mb-3">
            <label class="form-label">Total Usage Limit</label>
            <input type="number" class="form-control" wire:model.defer="usage_limit">
        </div>

        <div class="mb-3">
            <label class="form-label">Per User Limit</label>
            <input type="number" class="form-control" wire:model.defer="per_user_limit">
        </div>

        <div class="mb-3">
            <label class="form-label">Valid From</label>
            <input type="datetime-local" class="form-control" wire:model.defer="valid_from">
            @error('valid_from') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Valid Until</label>
            <input type="datetime-local" class="form-control" wire:model.defer="valid_until">
            @error('valid_until') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" wire:model.defer="is_active" checked>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">Add Coupon</button>
    </form>
</div>

</div>
