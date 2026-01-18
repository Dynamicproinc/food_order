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

class Edit extends Component
{
     use WithFileUploads;

    public $product;
    public $categories = [], $options = [], $choices = [];
    public $load_options = [], $load_choices = [];
    public $title, $category, $description, $status, $discounted_price, $original_price, $image, $option, $variant, $variant_price, $choice, $choice_price, $point, $rating;
    public $product_id;
    public $product_variant;
    public $variant_modal = false;
    public $choices_modal = false;
    public $sel_variant = [], $sv_option, $sv_variant, $sv_price;
    public $sc_choice, $sc_price, $sel_pc;
    public $load_status = ['draft', 'active'];

    public function render()
    {
        return view('livewire.admin.products.edit');
    }

    public  function mount($product_id)
    {

        $this->categories = Category::all();
        $this->load_options = Options::all();
        $this->load_choices = Choice::all();
        $this->product = Product::findOrFail($product_id);
        $this->options = $this->product->getVariants();
        $this->product_variant = $this->product->getVariants();
        $this->choices =  $this->product->getChoices();

        // set data
        $this->title = $this->product->title;
        $this->category = $this->product->category_id;
        $this->description = $this->product->description;
        $this->discounted_price = $this->product->discounted_price;
        $this->original_price = $this->product->original_price;
        $this->point = $this->product->points;
        $this->status = $this->product->status;
        $this->image = $this->product->image;
        $this->rating = (bool) $this->product->rating;
        

       
    }

    //////////////////////////////////////////Variants/////////////////////////////////////

    public function updateProduct(){
          $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:2000',
            'category' => 'required|integer|exists:categories,id',
            'discounted_price' => 'required|numeric|min:0|lt:original_price',
            'original_price' => 'required|numeric|min:0|gt:discounted_price',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'point'=> 'nullable'
        ]);

        
       if ($this->image instanceof \Illuminate\Http\UploadedFile) {
    // Generate unique filename
    $uniq_name = time() . '-' . Str::random(10) . '.' . $this->image->getClientOriginalExtension();
    // Store file
    $path = $this->image->storeAs('products', $uniq_name, 'public');
   
    // Save image path
    $image_path = 'uploads/products/' . $uniq_name;
} else {
    // If no new upload, keep the old image path
    $image_path = $this->product->image_path;
}

$this->product->title = $this->title;
$this->product->description = $this->description;
$this->product->category_id = $this->category;
$this->product->discounted_price = $this->discounted_price;
$this->product->original_price = $this->original_price;
$this->product->points = $this->point;
$this->product->image_path = $image_path;
$this->product->status = $this->status;
$this->product->rating = $this->rating;
$this->product->save();
return redirect()->back()->with('success', 'Product saved successfully!');

    }

    public function removeVariant($id)
    {
        $variant = Variant::findorFail($id);
        $variant->delete();
        $this->options = $this->product->getVariants();
        // notificatrion messages
    }

    public function addOptions()
    {
        $this->validate([
            'option' => 'required',
            'variant' => 'required',
            'variant_price' => 'required|numeric|min:0',


        ]);

        Variant::create([
            'option_id' => $this->option,
            'value' => $this->variant,
            'description'=> ' ',
            'price' => $this->variant_price,
            'product_id' => $this->product->id,
        ]);
        $this->options = $this->product->getVariants();

    }

    public function loadVariantModal($id){
        $this->variant_modal = true;
        $this->sel_variant = Variant::where('id', $id)->first();
        $this->sv_option = $this->sel_variant->option_id;
        $this->sv_variant = $this->sel_variant->value;
        $this->sv_price = $this->sel_variant->price;

    }
    public function closeVariantModal(){
        $this->variant_modal = false;
    }
    public function updateVariant() {

        
        $this->validate([
            'sv_option' => 'required',
            'sv_variant' => 'required',
            'sv_price' => 'required|numeric|min:0',
        ]);

        $id = $this->sel_variant->id;

       $v = Variant::findOrFail($id);
       $v->option_id = $this->sv_option;
       $v->value = $this->sv_variant;
       $v->price = $this->sv_price;
       $v->update();
         $this->options = $this->product->getVariants();
       $this->closeVariantModal();

    }

    ////////////////////////////////////////end variants/////////////////////////////////////


    /////////////////////////////////////////////////choices//////////////////////////

        public function removeChoice($id){
            $pc = ProductChoice::where('id', $id)->first();
            if($pc){
                $pc->delete();
                $this->choices =  $this->product->getChoices();
            }
        }

        public function addChoice(){
            $this->validate([
            'choice' => 'required',
            'choice_price' => 'required',
            


        ]);
             ProductChoice::create([
                        'Choice_id' =>$this->choice,
                        'price' => $this->choice_price,
                        'product_id' =>$this->product->id,
                        
                    ]);

                    $this->choices =  $this->product->getChoices();

        }

        public function editChoice($id){
                $this->choices_modal = true;
                $this->sel_pc = ProductChoice::where('id', $id)->first();
                $this->sc_choice =  $this->sel_pc->Choice_id;
                $this->sc_price = $this->sel_pc->price;
        }

        public function updateChoice(){
           $this->validate([
            'sc_choice' => 'required',
            'sc_price' => 'required',
            
        ]);
        $pc = ProductChoice::where('id',  $this->sel_pc->id)->first();
            $pc->Choice_id = $this->sc_choice;
            $pc->price = $this->sc_price;
            $pc->update();
            $this->choices_modal = false; 
             $this->choices =  $this->product->getChoices(); 


        }

        public function closeChoiceModal(){
            $this->choices_modal = false;
            
            

        }

    /////////////////////////////end choices//////////////////////////////////////////
}
