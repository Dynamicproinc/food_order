@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div class="col-3">
                            <div class="side-icon-bar">
                                <div class="list-group rounded-0" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home"><i
                                            class="bi bi-house"></i></a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-bs-toggle="list" href="#list-profile" role="tab"
                                        aria-controls="list-profile"><i class="bi bi-card-list"></i></a>
                                    {{-- <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        data-bs-toggle="list" href="#list-messages" role="tab"
                                        aria-controls="list-messages"><i class="bi bi-qr-code"></i></a> --}}
                                    <a class="list-group-item list-group-item-action" id="list-settings-list"
                                        data-bs-toggle="list" href="#list-settings" role="tab"
                                        aria-controls="list-settings"><i class="bi bi-gear"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                    aria-labelledby="list-home-list">
                                    <div class="p-3">
                                        
                                        <div class="mt-3 text-center">
                                            <h1 class="fw-bolder mb-0">{{number_format( $total_points?->balance ?? 0,0) }}</h1>
                                            <small>{{ __('Your coupone Balance') }}</small>
                                        </div>
                                        <div>
                                             
                                        <div class="d-flex justify-content-center align-items-center">
                                              @livewire('account.qrcode')
                                        </div>
                                        </div>
                                        {{-- <div class="mt-2 border rounded p-2">
                                            <h6 class="fw-bold">
                                                {{ __('Latest orders') }}
                                            </h6>
                                            
                                        </div> --}}

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="list-profile" role="tabpanel"
                                    aria-labelledby="list-profile-list">
                                    <div class="p-3">
                                        <h6 class="fw-bold">{{ __('Orders History') }}</h6>
                                        <div>
                                            <div>
                                                @if (count($sales_orders))
                                                    <div class="tab-pane-table">
                                                        <table class="table table-striped table-responsive">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col">{{ __('Order') }}</th>
                                                                    <th scope="col">{{ __('Date') }}</th>
                                                                    {{-- <th scope="col">{{ __('Type')}}</th> --}}
                                                                    {{-- <th scope="col">{{ __('Amount')}}</th> --}}
                                                                    <th scope="col">{{ __('Status') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($sales_orders as $item)
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <h2 class="fw-bold">
                                                                                {{ $item->daily_order_number }}</h2>
                                                                        </th>
                                                                        <td>
                                                                            <h6 class="mb-0">
                                                                                {{ $item->created_at->format('d.m.Y') }}
                                                                            </h6>
                                                                            <h5 class="fw-bold mb-0">
                                                                                {{ number_format($item->net_total, 2, ',', ' ') }}
                                                                                € </h5>
                                                                            <small
                                                                                class="text-muted text-uppercase txt-xs fw-bolder">{{ __($item->order_type) }}</small>

                                                                        </td>
                                                                        {{-- <td></td> --}}
                                                                        {{-- <td style="text-align: right"></td> --}}
                                                                        <td>
                                                                            <small class="txt-xs fw-bold text-uppercase">
                                                                                {{ __($item->status) }}</small>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <p class="text-muted">{{ __('No orders found') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                    aria-labelledby="list-messages-list">
                                    <div class="p-3">

                                    </div>
                                </div> --}}
                                <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                    aria-labelledby="list-settings-list">
                                    <div class="p-3">
                                        <h6 class="fw-bold">{{ __('Setting') }}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 d-flex justify-content-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark">
                            <i class="bi bi-power"></i> Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
