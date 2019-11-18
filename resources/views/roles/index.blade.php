@extends('layouts.app', (['title' => 'Management Role']))
@section('content')
{{-- Bread crumb and right sidebar toggle --}}
@breadcrumb(['header' => 'Role List', 'active' => 'View'])
    @bcItem(['value' => 'Roles'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb
{{-- End Bread crumb and right sidebar toggle --}}
@card
    @slot('header')
        <a class="btn btn-primary" href="{{ route('roles.create') }}"> Create New Role</a>
    @endslot
    @ifAlert
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th width="45px">No</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}" disabled><i class="fa fa-eye"></i></a>
                    @can('Manage Roles')
                    <a class="btn btn-warning" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" name="delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </table>
    </div>
{{ $roles->links() }}
@endcard

@endsection
