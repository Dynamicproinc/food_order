<div>
    <div>
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <h4 class="fw-bolder text-uppercase">{{ __('Add New Product') }}</h4>
                <form wire:submit="saveProduct">
                    <div class="rounded border bg-white shadow p-4 mb-3">

                        <div class="form-group mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" placeholder="Smash burger" wire:model="title">
                                <label for="title">{{ __('Product Title') }}</label>
                            </div>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                <select class="form-select text-capitalize @error('category') is-invalid @enderror"
                                    id="floption" aria-label="flarea" wire:model="category"
                                    @error('category') is-invalid @enderror">
                                    <option value="">{{ __('Select Category') }}</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach

                                </select>
                                <label for="floption">{{ __('Category') }}</label>
                            </div>
                            @error('category')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="" id="product_description"
                                    rows="10" wire:model="description"></textarea>
                                <label for="product_description">{{ __('Product Description') }}</label>
                            </div>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" wire:model="image">
                                <label for="image">{{ __('Product Image') }}</label>
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 form-group">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01"
                                        class="form-control @error('discounted_price') is-invalid @enderror"
                                        id="discounted_price" placeholder="" wire:model="discounted_price">
                                    <label for="discounted_price">{{ __('Discounted Price') }}</label>
                                </div>
                                @error('discounted_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6 form-group">
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01"
                                        class="form-control  @error('original_price') is-invalid @enderror"
                                        id="original_price" placeholder="" wire:model="original_price">
                                    <label for="original_price">{{ __('Original Price') }}</label>
                                </div>
                                @error('original_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="number" step="0.01"
                                    class="form-control  @error('point') is-invalid @enderror" id="point"
                                    placeholder="" wire:model="point">
                                <label for="point">{{ __('Coupon') }}</label>
                            </div>
                            @error('point')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="rating" value="" id="chkb1">
                            <label class="form-check-label" for="chkb1">
                            {{__('Ratings')}}
                            </label>
                        </div>

                    </div>

                    <div class="rounded border bg-white shadow mb-3">
                        <div class="p-4">
                            <h6>{{ __('Options') }}</h6>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-floating">
                                        <select class="form-select text-capitalize" wire:model="option" id="floption"
                                            aria-label="flarea">
                                            <option value="">{{ __('Select') }}</option>
                                            @foreach ($load_options as $item)
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
                                        <input type="text" class="form-control" id="variant" placeholder=""
                                            wire:model="variant">
                                        <label for="variant">{{ __('Variant') }}</label>
                                    </div>
                                    @error('variant')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <div class="form-floating mb-3">
                                        <input type="number" step="0.01" class="form-control" id="vprice"
                                            placeholder="" wire:model="variant_price">
                                        <label for="vprice">{{ __('Price') }}</label>
                                    </div>
                                    @error('variant_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-outline-primary btn-lg fw-bolder" type="button"
                                        wire:click="addOptions">{{ __('ADD') }}</button>
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
                                    @foreach ($options as $index => $item)
                                        <tr>
                                            <th scope="row">
                                                {{ \App\Models\Options::where('id', $item['option_id'])->first()?->option_name }}
                                            </th>
                                            <td>{{ $item['variant'] }}</td>
                                            <td>{{ $item['price'] }}</td>

                                            <td><button class="btn btn-defalut" type="button"
                                                    wire:click="removeOptions({{ $index }})">Remove</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <div class="text-center text-muted p-5">{{ __('No Variant Added') }}</div>
                        @endif



                    </div>

                    <div class="rounded border bg-white shadow mb-3">
                        <div class="p-4">
                            <h6>{{ __('Add-ons') }}</h6>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="floption" aria-label="flarea"
                                            wire:model="choice">
                                            <option value="">{{ __('Select') }}</option>
                                            @foreach ($load_choices as $item)
                                                <option value="{{ $item->id }}">{{ $item->Choice_name }}</option>
                                            @endforeach

                                        </select>
                                        <label for="floption">{{ __('Ingredeint') }}</label>
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
                                        <input type="number" step="0.01" class="form-control" id="cprice"
                                            placeholder="" wire:model="choice_price">
                                        <label for="cprice">{{ __('Price') }}</label>
                                    </div>
                                    @error('choice_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-outline-primary btn-lg fw-bolder" type="button"
                                        wire:click="addAddons">{{ __('ADD') }}</button>
                                </div>
                            </div>
                        </div>
                        @if (count($choices) > 0)
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
                                    @foreach ($choices as $index => $item)
                                        <tr>
                                            {{-- <th scope="row">Sauce</th> --}}
                                            <td>{{ \App\Models\Choice::where('id', $item['choice_id'])->first()?->Choice_name }}
                                            </td>
                                            {{-- <td>0.00</td> --}}
                                            <td>{{ $item['price'] }}</td>
                                            <td><button class="btn btn-defalut"
                                                    wire:click="removeAddons({{ $index }})"
                                                    type="button">Remove</button></td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        @else
                            <div class="text-center text-muted p-5">{{ __('No Choices Added') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-primary btn-lg form-control fw-bolder">
                                <span class="spinner-border" role="status" wire:loading wire:target="saveProduct">

                                </span>
                                {{ __('SAVE PRODUCT') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
