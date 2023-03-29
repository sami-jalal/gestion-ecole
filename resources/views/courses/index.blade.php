@extends('layout')

@section('content')
<a href="{{ route('courses.create') }}" class="btn btn-sm btn-success" style="float: right">
    <i class="fas fa-plus"></i>
</a>
<table id="datatable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Description</th>
            <th class="text-center">Auteur</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @unless (count($courses) == 0)
            @foreach ($courses as $course)
                <tr>
                    <td class="text-center">
                        <a href="{{asset($course->file ? 'storage/'. $course->file:'#')}}" target="_blank" >
                            {{$course->title}}
                        </a>
                    </td>
                    <td class="text-center">{{$course->description}}</td>
                    <td class="text-center">{{$course->author}}</td>
                    <td class="text-center">
                        <div class="row">                           
                            <div class="col-lg-1 col-md-1 col-sm-1 offset-lg-3 offset-md-3">
                                <a href="{{url('/courses/' . $course->id . '/edit')}}" class="btn btn-outline-success btn-xs btn_links">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 offset-lg-1 offset-md-1">
                                <form method="POST" action="{{url('/courses/' . $course->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-xs btn_links delete-btn">
                                       <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>                        
                    </td>
                </tr>
            @endforeach
        @endunless
    </tbody>
</table>
@endsection