@extends('layout')

@section('content') 
<a href="{{ route('users.create') }}" class="btn btn-sm btn-success" style="float: right">
    <i class="fas fa-user-plus"></i>
</a>
<table id="datatable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">Rôle</th>
            <th class="text-center">Psedou</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Prénom</th>
            <th class="text-center">Email</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @unless (count($users) == 0)
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{$user->role_name}}</td>
                    <td class="text-center">{{$user->name}}</td>
                    <td class="text-center">{{$user->last_name}}</td>
                    <td class="text-center">{{$user->first_name}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-1 offset-lg-4 offset-md-4">
                                <button type="button" class="btn btn-outline-primary btn_info btn_links"
                                    data-id='{{$user->id}}'
                                    data-name='{{$user->name}}'
                                    data-last_name='{{$user->last_name}}'
                                    data-first_name='{{$user->first_name}}'
                                    data-email='{{$user->email}}'
                                    data-birth_date='{{$user->birth_date}}'
                                    data-phone='{{$user->phone}}'
                                    data-adress='{{$user->adress}}'
                                    data-cin='{{$user->cin}}'
                                    >
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <a href="{{url('/users/' . $user->id . '/edit')}}" class="btn btn-outline-success btn-xs btn_links">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <form method="POST" action="{{url('/users/' . $user->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-xs btn_links delete-user-btn">
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

<x-user_info_modal/>
@endsection

