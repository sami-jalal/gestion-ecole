@extends('layout')

@section('content')
    <table id="datatable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">Cours</th>
                <th class="text-center">Enseignant</th>
                <th class="text-center">Description</th>
            </tr>
        </thead>
        <tbody>
            @unless (count($courses) == 0)
                @foreach ($courses as $course)
                    <tr>
                        <td class="text-center">
                            <a class="dwn_link" href="{{asset($course->file ? 'storage/'. $course->file:'#')}}" target="_blank" >
                                <i class="fas fa-download"></i> {{$course->title}}
                            </a>
                        </td>
                        <td class="text-center">{{$course->author}}</td>
                        
                        <td class="text-center">{{$course->description}}</td>
                    </tr>
                @endforeach
            @endunless
        </tbody>
    </table>
@endsection