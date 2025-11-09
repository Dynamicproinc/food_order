@extends('home')
@section('acc-content')
    <div>
        @if (auth()->user()->pointTransactions)
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
                        @foreach (auth()->user()->pointTransactions()->latest()->paginate(10) as $item)
                            <tr
                                class="@if ($item->type === 'credit') table-success @endif @if ($item->type === 'debit') table-danger @endif">
                                <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
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
            <p class="text-muted">{{ __('No recrds found') }}</p>
        @endif
    </div>
@endsection
