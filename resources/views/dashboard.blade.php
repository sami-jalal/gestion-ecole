@extends('layout')

@section('content')   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>
    <div class="row">
            @foreach($widgets as $widget)
                <x-card-dash :widget="$widget" />
            @endforeach
      
    </div>
@endsection