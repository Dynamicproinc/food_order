@extends('admin.layout')
@section('title', 'Shop Status')
@section('content')
    <div>
        <div class="container mt-3">
          @livewire('admin.setting.shopstatus')
        </div>
    </div>
@endsection