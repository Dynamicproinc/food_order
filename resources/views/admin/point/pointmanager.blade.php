@extends('admin.layout')
@section('title', 'Point Manager')
@section('content')
    <div>
        <div class="container mt-3">
          @livewire('admin.point.point-manager')
        </div>
    </div>
@endsection