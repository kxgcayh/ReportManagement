@extends('layouts.app', (['title' => 'Management Role']))
@section('content')
{{-- Bread crumb and right sidebar toggle --}}
@breadcrumb(['header' => 'Role Detail', 'active' => 'Show'])
    @bcItem(['value' => 'Roles'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb
{{-- End Bread crumb and right sidebar toggle --}}
<div class="container-fluid">
    @card
        @slot('header')
            <a class="btn btn-primary pull-right" href="{{ route('roles.index') }}"> Back</a>
        @endslot
        @ifAlert
        <table>
            <tr>
                <td>
                    <strong>Name</strong>
                </td>
                <td>:</td>
                <td>{{ $role->name }}</td>
            </tr>
            <tr>
                <td>
                    <strong>Permissions</strong>
                </td>
                <td>:</td>
                <td>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }},</label>
                        @endforeach
                    @endif
                </td>
            </tr>
        </table>
    @endcard
</div>
@endsection
