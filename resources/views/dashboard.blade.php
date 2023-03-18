@extends('layout')

@section('content')   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="custom_widget">

                <i class="fas fa-users"></i>
                <span>Utilisateur</span>
            </div>   
        </div>
    </div>
@endsection