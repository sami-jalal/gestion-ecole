@extends('layout')

@section('content') 
<a href="{{ route('admins.create') }}" class="btn btn-sm btn-success" style="float: right">
    <i class="fas fa-user-plus"></i>
</a>
<table id="datatable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">Psedou</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Prénom</th>
            <th class="text-center">Email</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @unless (count($admins) == 0)
            @foreach ($admins as $admin)
                <tr>
                    <td class="text-center">{{$admin->name}}</td>
                    <td class="text-center">{{$admin->last_name}}</td>
                    <td class="text-center">{{$admin->first_name}}</td>
                    <td class="text-center">{{$admin->email}}</td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-1 offset-lg-4 offset-md-4">
                                <button type="button" class="btn btn-outline-primary btn_info btn_links"
                                    data-id='{{$admin->id}}'
                                    data-name='{{$admin->name}}'
                                    data-last_name='{{$admin->last_name}}'
                                    data-first_name='{{$admin->first_name}}'
                                    data-email='{{$admin->email}}'
                                    data-birth_date='{{$admin->birth_date}}'
                                    data-phone='{{$admin->phone}}'
                                    data-adress='{{$admin->adress}}'
                                    data-cin='{{$admin->cin}}'
                                    >
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <a href="{{url('/admins/' . $admin->id . '/edit')}}" class="btn btn-outline-success btn-xs btn_links">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <form method="POST" action="{{url('/admins/' . $admin->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button id="delete-user-btn" type="button" class="btn btn-outline-danger btn-xs btn_links">
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

<x-admin_info_modal/>
@endsection

