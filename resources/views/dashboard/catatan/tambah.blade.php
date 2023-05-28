@extends('dashboard.layouts.dashboard')

@section('title')
    Dashboard | Buat Catatan Baru
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        <div class="">
            <x-dashboard.breadcrumb>
                <a href="#" class="text-gray-500 hover:text-primary-700">Catatan</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-dark-primary hover:text-primary-700">Buat Catatan Baru</a>
            </x-dashboard.breadcrumb>
        </div>
        <livewire:dashboard.catatan.item.create />
    </div>
@endsection
