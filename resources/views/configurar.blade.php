@extends('layouts/main')

@section('content')
    <div class="row mt-3">
        <div class="col-md-3">
            <livewire:sucursales/>
        </div>
        <div class="col-md-3">
            <livewire:roles-component/>
        </div>
        <div class="col-md-3">
            <livewire:etapas-component/>
        </div>
        <div class="col-md-3">
            <livewire:metodos-component/>
        </div>
        <div class="col-md-12">
            <livewire:lonas-component/>
        </div>
    </div>
@endsection
    