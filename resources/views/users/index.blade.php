@extends('layouts.app')

@section('content')
{{-- Bread crumb and right sidebar toggle --}}
@breadcumb(['header' => 'User List'])
    @breadc_item(['active' => 'Users'])
        @breadc_active Users @endbreadc_active
    @endbreadc_item
@endbreadcumb
{{-- End Bread crumb and right sidebar toggle --}}
@component('components.card')
    @slot('header')
        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
    @endslot

    @include('inc.message-succes')

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
                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    {!! $data->render() !!}
@endcomponent
@endsection
