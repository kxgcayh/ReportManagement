@extends('layouts.app', (['title' => 'Management Users']))

@section('content')
{{-- Bread crumb and right sidebar toggle --}}
@breadcrumb(['header' => 'User List', 'active' => 'View'])
@bcItem(['value' => 'User'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
{{-- End Bread crumb and right sidebar toggle --}}
@component('components.card')
@slot('header')
<a class="btn btn-primary" href="{{ route('users.create') }}"> Create New User</a>
@endslot

@include('inc.ifalert')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Departement</th>
                <th>Roles</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->departement['name'] }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" name="delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
    @endcomponent
    @endsection
