@extends('dashboard.layouts.dashboard')

@section('title')
    Kegiatan
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        <livewire:dashboard.pengelolaan-web.kegiatan.index>
    </div>
@endsection
