@extends('dashboard.layouts.dashboard')

@section('title')
    Catatan
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        <div class="">
            <x-dashboard.breadcrumb>
                <a href="#" class="text-gray-500 hover:text-primary-700">Catatan</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-dark-primary hover:text-primary-700">Catatan</a>
            </x-dashboard.breadcrumb>
        </div>
        <livewire:dashboard.catatan.item.index>
    </div>
@endsection
