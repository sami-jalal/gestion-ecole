@extends('layout')

@section('content')

    <form method="POST" action="{{url('users')}}" >
        @csrf
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 offset-lg-10">
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
                <a href="{{route('users.get_all')}}" class="btn btn-warning">Fermer</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12" style="border-right: 5px solid #777">
                <h2>Informations</h2>
                <div class="row">
                    {{-- Nom --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="last_name" class="form-label">Nom</label>
                        <input type="text" name="last_name" class="form-control form-control-sm" id="last_name" required aria-describedby="last_nameHelp" value="{{old('last_name')}}">
                        <div id="last_name" class="form-text">
                            @error('last_nameHelp')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Prénom --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="first_name" class="form-label">Prénom</label>
                        <input type="text" name="first_name" class="form-control form-control-sm" id="first_name" required aria-describedby="first_nameHelp" value="{{old('first_name')}}">
                        <div id="first_nameHelp" class="form-text">
                            @error('first_name')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Pseudo --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="name" class="form-label">Pseudo</label>
                        <input type="text" name="name" class="form-control form-control-sm" id="name" required aria-describedby="nameHelp" value="{{old('name')}}">
                        <div id="nameHelp" class="form-text">
                            @error('name')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Phone --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="cin" class="form-label">Numéro de téléphone</label>
                        <input type="text" name="phone" class="form-control form-control-sm" id="phone" aria-describedby="phoneHelp" value="{{old('cin')}}">
                        <div id="phoneHelp" class="form-text">
                            @error('phone')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- CIN --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="cin" class="form-label">CIN</label>
                        <input type="text" name="cin" class="form-control form-control-sm" id="cin" aria-describedby="cinHelp" value="{{old('cin')}}">
                        <div id="cinHelp" class="form-text">
                            @error('cin')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Date de naissance --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="birth_date" class="form-label">Date de naissance</label>
                        <input type="date" name="birth_date" class="form-control form-control-sm" id="birth_date" aria-describedby="birth_dateHelp" value="{{old('birth_date')}}">
                        <div id="birth_dateHelp" class="form-text">
                            @error('birth_date')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Rôle --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="role" class="form-label">Rôle</label>
                        <select name="role" id="role" class="form-control form-control-sm">
                            @foreach ($roles as $role)
                                <option value="{{$role->code}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- CNE --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="cne" class="form-label">CNE</label>
                        <input type="text" name="cne" class="form-control form-control-sm" id="cne" aria-describedby="cneHelp" disabled value="{{old('cne')}}">
                        <div id="cneHelp" class="form-text">
                            @error('cne')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Adresse --}}
                    <div class="mb-3">
                        <label for="adress" class="form-label">Adresse</label>
                        <textarea id="adress" name="adress" class="form-control form-control-sm" rows="3" aria-describedby="adressHelp">{{old('adress')}}</textarea>
                        <div id="adressHelp" class="form-text">
                            @error('adress')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2>Compte d'accès</h2>
                
                {{-- Email --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email"  name="email" class="form-control form-control-sm" id="exampleInputEmail1" required aria-describedby="emailHelp" value="{{old('email')}}">
                    <div id="emailHelp" class="form-text">
                        @error('email')
                            <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Mot de passe --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password"  name="password" class="form-control form-control-sm" id="password" aria-describedby="passwordHelp" required placeholder="Mot de passe">
                    <div id="passwordHelp" class="form-text">
                        @error('password')
                            <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password"  name="password_confirmation" class="form-control form-control-sm" id="password_confirmation" required aria-describedby="password_confirmationHelp"  placeholder="Confirmations de mot de passe">
                    <div id="password_confirmationHelp" class="form-text">
                        @error('password_confirmation')
                            <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            
            
        </div>
        
    </form>

@endsection