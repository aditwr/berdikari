@extends('dashboard.layouts.dashboard')

@section('title')
    Dashboard | Kelola Keuangan
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        <div class="">
            <x-dashboard.breadcrumb>
                <a href="#" class="text-gray-500 hover:text-primary-700">Keuangan</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-dark-primary hover:text-primary-700">Kelola Keuangan</a>
            </x-dashboard.breadcrumb>
        </div>
        <livewire:dashboard.keuangan.kelola.keuangan>
    </div>
@endsection
