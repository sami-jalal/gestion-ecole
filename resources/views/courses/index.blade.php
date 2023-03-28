@extends('layout')

@section('content')
<a href="{{ route('courses.create') }}" class="btn btn-sm btn-success" style="float: right">
    <i class="fal fa-books-medical"></i>
</a>
<table id="datatable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Description</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Prénom</th>
            <th class="text-center">Email</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @unless (count($courses) == 0)
            @foreach ($courses as $course)
                <tr>
                    <td class="text-center">{{$course->role_name}}</td>
                    <td class="text-center">{{$course->name}}</td>
                    <td class="text-center">{{$course->last_name}}</td>
                    <td class="text-center">{{$course->first_name}}</td>
                    <td class="text-center">{{$course->email}}</td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-1 offset-lg-4 offset-md-4">
                                <button type="button" class="btn btn-outline-primary btn_info btn_links"
                                    data-id='{{$course->id}}'
                                    data-name='{{$course->name}}'
                                    data-last_name='{{$course->last_name}}'
                                    data-first_name='{{$course->first_name}}'
                                    data-email='{{$course->email}}'
                                    data-birth_date='{{$course->birth_date}}'
                                    data-phone='{{$course->phone}}'
                                    data-adress='{{$course->adress}}'
                                    data-cin='{{$course->cin}}'
                                    >
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <a href="{{url('/courses/' . $course->id . '/edit')}}" class="btn btn-outline-success btn-xs btn_links">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <form method="POST" action="{{url('/courses/' . $course->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-xs btn_links delete-course-btn">
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