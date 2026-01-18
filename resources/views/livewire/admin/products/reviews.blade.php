<div>
   <div>
    
   <div class="">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>User</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Publish</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->getProduct()->title }}</td>
                <td>{{ $review->getUser()?->name.' '.$review->getUser()?->last_name }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->comment }}</td>
                <td>
                  @if($review->status == 'pending')
                  <button class="btn btn-outline-primary btn-sm" wire:click="toggleAction({{$review->id}})">{{__('Approve')}}</button>
                  @else
                  <button class="btn btn-outline-danger btn-sm" wire:click="toggleAction({{$review->id}})">{{__('Disable')}}</button>
                  @endif
                </td>
                <td>{{ $review->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {{ $reviews->links() }}
    </div>
   </div>
   </div>
</div>
