@extends('layouts.app', (['title' => 'Management Users']))

@section('content')

<div class="container-fluid">
    {{-- Bread crumb and right sidebar toggle --}}
    @breadcrumb(['header' => 'Detail User', 'active' => 'Show'])
        @bcItem(['value' => 'User'])
        @bcItem(['value' => 'Data Master'])
    @endbreadcrumb
    {{-- End Bread crumb and right sidebar toggle --}}
    @ifAlert
    @card
    @slot('header')
        <a class="btn btn-primary pull-right" href="{{ route('users.index') }}"> Back</a>
    @endslot
        <table>
            <tr>
                <td>
                    <strong>Name</strong>
                </td>
                <td>:</td>
                <td>
                    {{ $user->name }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Email</strong>
                </td>
                <td>:</td>
                <td>
                    {{ $user->email }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Departement</strong>
                </td>
                <td>:</td>
                <td>
                    {{ $user->departement['name'] }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Role</strong>
                </td>
                <td>:</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
            </tr>
        </table>
    @endcard
</div>
@endsection
