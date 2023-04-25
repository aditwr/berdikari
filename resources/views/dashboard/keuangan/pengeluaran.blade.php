@extends('dashboard.layouts.dashboard')

@section('title')
    Dashboard | Pengeluaran
@endsection

@section('content')
    <div class="dashboard-padding-responsive">
        <div class="">
            <x-dashboard.breadcrumb>
                <a href="#" class="text-gray-500 hover:text-primary-700">Keuangan</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-dark-primary hover:text-primary-700">Pengeluaran</a>
            </x-dashboard.breadcrumb>
        </div>
        <div class="flex flex-col mb-8 md:flex-row md:items-end gap-x-8 gap-y-2">
            <div class="">
                <livewire:dashboard.keuangan.partials.select>
            </div>
            <div class="">
                <livewire:dashboard.keuangan.pengeluaran.create>
            </div>
        </div>
        <livewire:dashboard.keuangan.pengeluaran.table>
    </div>
@endsection
