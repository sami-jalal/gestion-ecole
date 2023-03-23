@extends('layout')

@section('content') 
<table id="example" class="table table-striped" style="width:100%">
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
                        <button type="button" class="btn btn-outline-primary btn_links"
                            data-id='{{$admin->id}}'
                            data-name='{{$admin->name}}'
                            data-last_name='{{$admin->last_name}}'
                            data-first_name='{{$admin->first_name}}'
                            data-email='{{$admin->email}}'
                            data-birth_date='{{$admin->birth_date}}'
                            >
                            <i class="far fa-eye"></i>
                        </button>
                        <a href="#" target="_blank" class="btn btn-outline-success btn-xs btn_links">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="#" target="_blank" class="btn btn-outline-danger btn-xs btn_links">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endunless
</table>

<x-admin_info_modal/>
@endsection

