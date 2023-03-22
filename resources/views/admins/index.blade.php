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
                        <a href="#" target="_blank" class="crud-link text-info">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="#" target="_blank" class="crud-link text-success">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="#" target="_blank" class="crud-link text-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endunless
</table>
@endsection