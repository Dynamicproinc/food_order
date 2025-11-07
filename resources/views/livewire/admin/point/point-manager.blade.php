<div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="bg-white p-3 shadow rounded mb-3">
                <div>
                    <form wire:submit="search">
                        <input type="text" class="form-control form-control-lg mb-2"
                            placeholder="{{ __('Scan QR code here..') }}" wire:model="qr" id="qrText">
                        @error('qr')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror



                    </form>
                </div>
            </div>
            {{--  --}}
            @if ($user)
                <section>
                    <div class="bg-white p-3 shadow rounded mb-3">
                        <div>
                            <div class="row">
                                <div class="col-3">
                                    <h5><strong>{{ __('Name') }}</strong></h5>
                                </div>
                                <div class="col-9">
                                    <h5>{{ $user?->name . ' ' . $user?->last_name }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h5><strong>{{ __('Email') }}</strong></h5>
                                </div>
                                <div class="col-9">
                                    <h5>{{ $user?->email }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h5><strong>{{ __('Balance') }}</strong></h5>
                                </div>
                                <div class="col-9">
                                    <h5>{{$this->balance}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-3 shadow rounded mb-3">
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" placeholder="0.00" wire:model="amount">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-lg btn-outline-dark w-100"  wire:confirm="{{__('Please confirm if you want to continue with this transaction?')}}" wire:click="debit">{{ __('DEBIT') }}</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-lg btn-dark w-100" wire:confirm="{{__('Please confirm if you want to continue with this transaction?')}}" wire:click="credit">{{ __('CREDIT') }}</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5>{{ __('History') }}</h5>
                        @if ($user->pointTransactions)
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Type') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->pointTransactions()->latest()->get() as $item)
                                        
                                    <tr class="@if($item->type === 'credit') table-success @endif @if($item->type === 'debit') table-danger @endif">
                                        <td >{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                        <td class="text-uppercase">{{ $item->type }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->type === 'debit' ? -$item->amount : $item->amount }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{-- {{ $user->pointTransactions()->latest()->paginate(5)->links()}} --}}
                        </div>
                        @else
                        <p class="text-muted">{{__('No recrds found')}}</p>
                        @endif
                        
                    </div>

                </section>
            @else
                <div class="bg-white p-3 shadow rounded mb-3">
                    <h5 class="fw-bold text-muted text-center">
                        @if ($er_message)
                            <h5 class="fw-bold text-danger">{{ __('Invalid QR Code') }}</h5>
                        @endif
                    </h5>
                </div>
            @endif

            {{--  --}}
        </div>
    </div>
    {{--  --}}
    {{--  --}}
</div>
