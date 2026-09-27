@extends('home')
@section('acc-content')
    <div>
         <style>
            td, th {
                vertical-align: middle !important;
                font-size: 12px;
                text-transform: uppercase
            }
        </style>
        @if (count(auth()->user()->pointTransactions) > 0)
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Date') }}</th>
                            {{-- <th>{{ __('Type') }}</th> --}}
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Amount') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->pointTransactions()->latest()->paginate(10) as $item)
                            <tr
                                class="">
                                <td>{{ $item->created_at->timezone('Europe/Zagreb')->format('d.m.Y. H:i') }}</td>
                                {{-- <td class="text-uppercase">{{ $item->type }}</td> --}}
                                <td>{{ $item->description }}</td>
                                <td style="text-align: right; font-weight: bold;" @if ($item->type === 'credit') class="text-success" @endif @if ($item->type === 'debit') class="text-danger" @endif>{{ number_format($item->type === 'debit' ? -$item->amount : $item->amount,0) }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div>
                {{-- {{ $user->pointTransactions()->latest()->paginate(5)->links()}} --}}
            </div>
        @else
            <p class="text-muted">{{ __('No records found') }}</p>
        @endif
    </div>
@endsection
