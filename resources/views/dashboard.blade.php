@extends('layout')

@section('content')   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="row">
        <x-card-dash title='Utilisateur' icon='fas fa-users' number='45' />
    </div>
@endsection