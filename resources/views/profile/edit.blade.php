@extends('layout')
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div> --}}

            @include('profile.partials.update-password-form')

        {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div> --}}
    </div>
</div>
@endsection
