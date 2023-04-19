@extends('dashboard.layouts.dashboard')

@section('title')
    Dashboard | Pemasukan
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        <div class="">
            <x-dashboard.breadcrumb>
                <a href="#" class="text-gray-500 hover:text-primary-700">Keuangan</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-dark-primary hover:text-primary-700">Pemasukan</a>
            </x-dashboard.breadcrumb>
        </div>
        <div class="">
            <livewire:dashboard.keuangan.partials.select>
        </div>
        <div class="">

        </div>
        <livewire:dashboard.keuangan.pemasukan.create>
            <livewire:dashboard.keuangan.pemasukan.table>
    </div>
@endsection
