@extends('dashboard.layouts.dashboard')

@section('title')
    Daftar Barang
@endsection

@section('content')
    <livewire:dashboard.inventaris.daftar-barang idInventaris="{{ $id }}" />
@endsection
