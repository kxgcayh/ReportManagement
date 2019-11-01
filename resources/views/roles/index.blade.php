@extends('layouts.app')


@section('content')
{{-- Bread crumb and right sidebar toggle --}}
@breadcumb(['header' => 'Role Management'])
    @breadc_item(['active' => 'Roles'])
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb
{{-- End Bread crumb and right sidebar toggle --}}
@card
    @slot('header')
        <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
    @endslot

    @include('inc.message-succes')

    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            @endforeach
        </table>
    </div>
{!! $roles->render() !!}
@endcard

@endsection
