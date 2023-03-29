@extends('layout')

@section('content')
    <div class="row">
        <div  id="form_content" class="col-lg-6 col-md-6 col-sm-12 offset-lg-3 offset-md-3">
            <form method="POST" action="{{url('courses/' . $course->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 offset-lg-8">
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1">
                        <a href="{{route('courses.get_all')}}" class="btn btn-warning">Fermer</a>
                    </div>
                </div>
                <div class="row">
                    {{-- Titre --}}
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" name="title" class="form-control form-control-sm" id="title" required aria-describedby="titleHelp" value="{{$course->title}}">
                        <div id="title" class="form-text">
                            @error('titleHelp')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Description --}}
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control form-control-sm" rows="3" aria-describedby="descriptionHelp">{{$course->description}}</textarea>
                        <div id="descriptionHelp" class="form-text">
                            @error('description')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Document --}}
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        
                        <label for="file" class="form-label">document</label> ==> Actuel <a href="{{asset($course->file ? 'storage/'. $course->file:'#')}}" target="_blank" >
                            {{$course->title}}
                        </a>
                        <input type="file" name="file" class="form-control form-control-sm" id="file" aria-describedby="fileHelp" value="{{old('file')}}">
                        <div id="file" class="form-text">
                            @error('fileHelp')
                                <span class="alert-custom text-danger"><i class="icon fas fa-ban"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection