@extends('dashboard.layouts.dashboard')

@section('title')
    Inventaris
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        <div class="">
            <x-dashboard.breadcrumb>
                <a href="#" class="text-gray-500 hover:text-primary-700">Inventaris</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-dark-primary hover:text-primary-700">Daftar Inventaris</a>
            </x-dashboard.breadcrumb>
        </div>
        <livewire:dashboard.inventaris.index />
    </div>
@endsection
