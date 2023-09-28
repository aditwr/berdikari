@extends('dashboard.layouts.dashboard')

@section('title')
    Galeri
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        @livewire('dashboard.pengelolaan-web.galeri.index')
    </div>
@endsection
