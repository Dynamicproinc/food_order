<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Category;
use App\Models\Options;
use App\Models\Choice;
use App\Models\Variant;
use App\Models\ProductChoice;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;
    public $categories = [], $options = [], $choices = [];
    public $load_options = [], $load_choices = [];
    public $title, $category, $description, $discounted_price, $original_price, $image, $option, $variant, $variant_price, $choice, $choice_price, $point, $rating;

    public function render()
    {
        return view('livewire.admin.products.add');
    }

    public function mount()
    {
        
        $this->categories = Category::all();
        $this->load_options = Options::all();
        $this->load_choices = Choice::all();
    }

    public function saveProduct()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:2000',
            'category' => 'required|integer|exists:categories,id',
            'discounted_price' => 'required|numeric|min:0|lt:original_price',
            'original_price' => 'required|numeric|min:0|gt:discounted_price',
            'image' => 'required|nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'point'=> 'nullable'
        ]);

        $uniq_name = time() . '-' . Str::random(10) . '.' . $this->image->getClientOriginalExtension();
$path = $this->image->storeAs('products', $uniq_name, 'public');
$image_path = 'uploads/products/' . $uniq_name;

        $product = new Product;
        $product->user_id = auth()->user()->id;
        $product->title = $this->title;
        $product->category_id = $this->category;
        $product->description = $this->description;
        $product->quantity = 0;
        $product->discounted_price = $this->discounted_price;
        $product->original_price = $this->original_price;
        $product->slug = Str::slug($this->title);
        $product->image_path = $image_path;
        $product->points = $this->point;
        $product->rating = $this->rating;
        if($product->save()){
            //if product have options
            if(count($this->options) > 0){
                foreach ($this->options as $index => $item) {
                    Variant::create([
                        'option_id' =>$item['option_id'],
                        'value' => $item['variant'],
                        'description'=> ' ',
                        'price' => $item['price'],
                        'product_id' => $product->id,
                    ]);
                 }
                }


                 // if product choices
                 if(count($this->choices) > 0){
                 foreach ($this->choices as $index => $item) {
                    ProductChoice::create([
                        'Choice_id' =>$item['choice_id'],
                        'price' => $item['price'],
                        'product_id' => $product->id,
                        
                    ]);
                 }
                }
              return redirect()->back();

        }
    }

    public function addOptions()
    {

        $this->validate([
            'option' => 'required',
            'variant' => 'required',
            'variant_price' => 'required|numeric|min:0',


        ]);

        $options = [
            'option_id' => $this->option,
            'variant' => $this->variant,
            'price' => $this->variant_price,
        ];

        $found = false;

        foreach ($this->options as $index => $item) {
            if ($item['option_id'] == $options['option_id'] && $item['variant'] == $options['variant']) {
                // Update existing item
                $this->options[$index]['price'] = $options['price'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            // Add new item
            $this->options[] = $options;
        }
    }

    public function removeOptions($id)
    {
        unset($this->options[$id]);
        $this->options = array_values($this->options); // reindex array
    }

    public function addAddons(){
        $this->validate([
            'choice' => 'required',
            'choice_price' => 'required',
            


        ]);

        $choices = [
            'choice_id' => $this->choice,
            'price' => $this->choice_price,
        ];

        $found = false;
        foreach($this->choices as $index => $item){
            if($item['choice_id'] == $choices['choice_id']){
                 $this->choices[$index]['price'] = $choices['price'];
                $found = true;
                break;
            }
        }
        if (!$found) {
            // Add new item
            $this->choices[] = $choices;
        }


    }

    public function removeAddons($id){
     unset($this->choices[$id]);
    $this->choices = array_values($this->choices); // reindex array   
    }
}
