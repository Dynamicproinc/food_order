<?php

namespace App\Livewire\Admin\Products;
use App\Models\CouponDiscount;
use Livewire\Component;

class Coupon extends Component
{
    public $code;
    public $description;
    public $discount_type;
    public $discount_value;
    public $max_discount_amount;
    public $min_order_amount;
    public $usage_limit;
    public $per_user_limit;
    public $valid_from;
    public $valid_until;
    public $is_active = true;

    public $message = '';

    protected $rules = [
        'code' => 'required|string',
        'description' => 'nullable|string',
        'discount_type' => 'required|in:percentage,fixed',
        'discount_value' => 'required|numeric|min:0',
        'max_discount_amount' => 'nullable|numeric|min:0',
        'min_order_amount' => 'nullable|numeric|min:0',
        'usage_limit' => 'nullable|integer|min:1',
        'per_user_limit' => 'nullable|integer|min:1',
        'valid_from' => 'required|date',
        'valid_until' => 'required|date|after_or_equal:valid_from',
        'is_active' => 'boolean',
    ];


    public function render()
    {
        return view('livewire.admin.products.coupon');
    }

    public function saveCoupon()
    {
        $this->validate();

        CouponDiscount::create([
            'code' => $this->code,
            'description' => $this->description,
            'discount_type' => $this->discount_type,
            'discount_value' => $this->discount_value,
            'max_discount_amount' => $this->max_discount_amount,
            'min_order_amount' => $this->min_order_amount,
            'usage_limit' => $this->usage_limit,
            'per_user_limit' => $this->per_user_limit,
            'valid_from' => $this->valid_from,
            'valid_until' => $this->valid_until,
            'is_active' => $this->is_active,
        ]);

       
        $this->message = "Coupon created successfully!";
    }


}
