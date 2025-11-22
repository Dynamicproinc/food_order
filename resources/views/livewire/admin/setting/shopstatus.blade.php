<div>
    <div>
        <div>
            <h4>{{__('Shop Status')}}</h4>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <input type="text" wire:model.defer="status" class="form-control">
            </div>
            <div class="col-lg-3">
                <input type="date" wire:model.defer="closing_date" class="form-control">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-dark" wire:click="saveStatus">{{__('Save')}}</button>
            </div>
        </div>
        <div class="div"></div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">{{__('Status')}}</th>
      <th scope="col">{{__('Reason')}}</th>
      <th scope="col">{{__('Closing Date')}}</th>
      <th scope="col">{{__('Delete')}}</th>
     
    </tr>
  </thead>

  <tbody>
    @foreach ($statuses as $status)
    <tr>
      
      <td>{{ $status->status_name}}</td>
      <td>{{ $status->status_color}}</td>
      <td>{{ $status->closing_date}}</td>
      <td><button class="btn btn-danger" wire:click="delete({{ $status->id }})" wire:confirm="Are you sure?">{{__('Delete')}}</button></td>

    </tr>
        
    @endforeach
    
  
  </tbody>
</table>
    </div>
</div>
