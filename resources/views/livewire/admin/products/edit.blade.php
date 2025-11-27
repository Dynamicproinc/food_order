<div>
   @section('title', $product->title . ' - Edit Product')
   <div>
    
        <div class="rounded border bg-white shadow p-4 mb-3">
                    
                     <form wire:submit="updateProduct">
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                    <select class="form-select text-capitalize @error('status') is-invalid @enderror" id="flstatus"
                                        aria-label="flarea" wire:model="status" @error('status') is-invalid @enderror>
                                        <option value="">{{__('Select Category')}}</option>
                                        @foreach ($load_status as $item )
                                            <option value="{{$item}}">{{ $item}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <label for="flstatus">{{__('Status')}}</label>
                                </div>
                                @error('status')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                        </div>
                    <div class="form-group mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Smash burger" wire:model="title">
                                <label for="title">{{ __('Product Title') }}</label>
                            </div>
                            @error('title')
                                   <small class="text-danger">{{ $message }}</small> 
                            @enderror

                        </div>
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                    <select class="form-select text-capitalize @error('category') is-invalid @enderror" id="floption"
                                        aria-label="flarea" wire:model="category" @error('category') is-invalid @enderror>
                                        <option value="">{{__('Select Category')}}</option>
                                        @foreach ($categories as $item )
                                            <option value="{{$item->id}}">{{ $item->category_name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    <label for="floption">{{__('Category')}}</label>
                                </div>
                                @error('category')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="" id="product_description" rows="10" wire:model="description"></textarea>
                                <label for="product_description">{{ __('Product Description') }}</label>
                            </div>
                            @error('description')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" wire:model="image">
                                <label for="image">{{ __('Product Image') }}</label>
                            </div>
                            @error('image')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 form-group">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" class="form-control @error('discounted_price') is-invalid @enderror" id="discounted_price" placeholder="" wire:model="discounted_price">
                                    <label for="discounted_price">{{ __('Discounted Price') }}</label>
                                </div>
                                @error('discounted_price')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-6 form-group">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" class="form-control  @error('original_price') is-invalid @enderror" id="original_price" placeholder="" wire:model="original_price">
                                    <label for="original_price">{{ __('Original Price') }}</label>
                                </div>
                                @error('original_price')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" class="form-control  @error('point') is-invalid @enderror" id="point" placeholder="" wire:model="point">
                                    <label for="point">{{ __('Coupon') }}</label>
                                </div>
                                @error('point')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            
                            <div class="form-group d-flex justify-content-between">
                                <div>
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                </div>
                                <button class="btn btn-lg btn-primary" type="submit">{{ __('SAVE CHANGES')}}</button>
                            </div>
                    </form>   
                    
                </div>
                {{-- variation modal --}}
                
                <div class="rounded border bg-white shadow mb-3">
                    <div class="p-4">
                        <h6>{{ __('Options') }}</h6>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-floating">
                                    <select class="form-select text-capitalize" wire:model="option" id="floption"
                                        aria-label="flarea">
                                        <option value="">{{__('Select')}}</option>
                                        @foreach ( $load_options as $item )
                                           <option value="{{ $item->id }}">{{ $item->option_name }}</option> 
                                        @endforeach
                                    </select>
                                    <label for="floption">Option</label>
                                </div>
                                 @error('option')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="variant" placeholder="" wire:model="variant">
                                    <label for="variant">{{ __('Variant') }}</label>
                                </div>
                                 @error('variant')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" class="form-control" id="vprice" placeholder="" wire:model="variant_price">
                                    <label for="vprice">{{ __('Price') }}</label>
                                </div>
                                 @error('variant_price')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-3">
                                <button class="btn btn-outline-primary btn-lg fw-bolder" type="button" wire:click="addOptions">{{ __('ADD') }}</button>
                            </div>
                        </div>
                    </div>
                    @if (count($options) > 0)
                         <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Option') }}</th>
                                <th scope="col">{{ __('Value') }}</th>
                                <th scope="col">{{ __('Price') }}</th>
                                {{-- <th scope="col">{{ __('Quantity') }}</th> --}}
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $options as $index => $item )
                                
                            <tr>
                                <th scope="row" style="text-transform: capitalize">{{ \App\Models\Options::where('id', $item->option_id)->first()?->option_name }}</th>
                                <td>{{ $item->value }}
                                   
                                </td>
                                <td>{{ $item->price }}</td>
                                
                                <td>
                                    <button class="btn btn-default" type="button" wire:confirm="{{__('Are you sure?')}}" wire:click="removeVariant({{ $item->id }})">Remove</button>
                                    <button class="btn btn-default" type="button"  wire:click="loadVariantModal({{$item->id}})">Edit</button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else
                       <div class="text-center text-muted p-5">{{__('No Variant Added')}}</div> 
                    @endif
                        
                    
                   
                </div>

                {{-- choices modal --}}
                <div class="rounded border bg-white shadow mb-3">
                    <div class="p-4">
                        <h6>{{ __('Add-ons') }}</h6>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-floating">
                                    <select class="form-select" id="floption"
                                        aria-label="flarea" wire:model="choice">
                                        <option value="">{{ __('Select') }}</option>
                                        @foreach ($load_choices  as $item)
                                            <option value="{{ $item->id }}">{{ $item->Choice_name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    <label for="floption">{{__('Ingredeint')}}</label>
                                </div>
                                @error('choice')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            {{-- <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="option" placeholder="" wire:model="">
                                    <label for="option">{{ __('Variant') }}</label>
                                </div>
                            </div> --}}
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" class="form-control" id="cprice" placeholder="" wire:model="choice_price">
                                    <label for="cprice">{{ __('Price') }}</label>
                                </div>
                                @error('choice_price')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-3">
                               <button class="btn btn-outline-primary btn-lg fw-bolder" type="button" wire:click="addChoice">{{ __('ADD') }}</button>
                            </div>
                        </div>
                    </div>
                    @if(count($choices) >0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Choice') }}</th>
                                {{-- <th scope="col">{{ __('Value') }}</th> --}}
                                <th scope="col">{{ __('Price') }}</th>
                                {{-- <th scope="col">{{ __('Quantity') }}</th> --}}
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($choices as  $item )
                                <tr>
                                {{-- <th scope="row">Sauce</th> --}}
                                <td>{{\App\Models\Choice::where('id', $item->Choice_id)->first()?->Choice_name}}</td>
                                {{-- <td>0.00</td> --}}
                                <td>{{ $item['price'] }}</td>
                                <td>
                                    <button class="btn btn-defalut" wire:confirm="{{__('Are you sure?')}}" wire:click="removeChoice({{ $item->id }})" type="button">Remove</button>
                                    <button class="btn bnt-default"  wire:click="editChoice({{$item->id}})">Edit </button>
                                </td>
                            </tr> 
                            @endforeach
                           

                        </tbody>
                    </table>
                    @else
                     <div class="text-center text-muted p-5">{{__('No Choices Added')}}</div>
                    @endif
                </div>

                {{--  --}}
                {{-- pop modal --}}
                @if ($variant_modal == true)
                    <div class="light-modal">
                    <div class="light-modal-content">
                        <div class="light-dialog-box">
                             <div class="p-3">
                                    <h5 class="mb-3">Update Values</h5>
                                    
                                        <div class="form-group mb-3">
                                             <div class="form-floating">
                                    <select class="form-select text-capitalize" wire:model="sv_option" id="floption"
                                        aria-label="flarea">
                                        <option value="">{{__('Select')}}</option>
                                        @foreach ( $load_options as $item )
                                           <option value="{{ $item->id }}">{{ $item->option_name }}</option> 
                                        @endforeach
                                    </select>
                                    <label for="floption">Option</label>
                                </div>
                                 @error('option')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                                        </div>
                                        <div class="form-group">
                                             <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="variant" placeholder="" wire:model="sv_variant">
                                    <label for="variant">{{ __('Variant') }}</label>
                                </div>
                                 @error('variant')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                                        </div>
                                        <div class="form-group">
                                             <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="spirce" placeholder="" wire:model="sv_price">
                                    <label for="spirce">{{ __('Price') }}</label>
                                </div>
                                 @error('variant')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                                        </div>
                                        
                                    
                                </div>
                            <div class="lm-dialog-footer">
                               
                                <div class="d-flex flex-row-reverse px-3">
                                    <button class="btn btn-primary" type="submit" wire:click="updateVariant">Save</button>
                                    <button class="btn btn-default" wire:click="closeVariantModal" type="button">Cancel</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                @endif
                {{-- pop modal --}}

                {{-- choice modal --}}
                @if ($choices_modal == true)
                    <div class="light-modal">
                    <div class="light-modal-content">
                        <div class="light-dialog-box">
                             <div class="p-3">
                                    <h5 class="mb-3">Update Values</h5>
                                    
                                        <div class="form-group mb-3">
                                             <div class="form-floating">
                                    <select class="form-select text-capitalize" wire:model="sc_choice" id="floption"
                                        aria-label="flarea">
                                        <option value="">{{__('Select')}}</option>
                                        @foreach ( $load_choices as $item )
                                           <option value="{{ $item->id }}">{{ $item->Choice_name }}</option> 
                                        @endforeach
                                    </select>
                                    <label for="floption">Choices</label>
                                </div>
                                 @error('sc_choice')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                                        </div>
                                       
                                        <div class="form-group">
                                             <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="spirce" placeholder="" wire:model="sc_price">
                                    <label for="spirce">{{ __('Price') }}</label>
                                </div>
                                 @error('sc')
                                   <small class="text-danger">{{ $message }}</small> 
                                @enderror
                                        </div>
                                        
                                    
                                </div>
                            <div class="lm-dialog-footer">
                               
                                <div class="d-flex flex-row-reverse px-3">
                                    <button class="btn btn-primary" type="submit" wire:click="updateChoice">Save</button>
                                    <button class="btn btn-default" wire:click="closeChoiceModal" type="button">Cancel</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                @endif
                {{-- end choice modal --}}
                {{-- end variation modal --}}
    
   </div>
</div>
