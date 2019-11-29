@extends('layouts.app', (['title' => 'Management Project']))
@section('content')
@breadcrumb(['header' => 'Detail Project', 'active' => 'Show'])
@bcItem(['value' => 'Project'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert
@card
@slot('header')
<div class="form-group pull-right">
    <a class="btn btn-primary" href="#"><i class="fa fa-plus-circle"></i> Create Report</a>
    <a class="btn btn-info" href="{{ route('projects.index') }}"> Back</a>
</div>
@endslot
<table class="text-center">
    <tr>
        <td><strong>Project Name</strong></td>
        <td>:</td>
        <td>{{ $projects->name }}</td>
    </tr>
    <tr>
        <td><strong>Description</strong></td>
        <td>:</td>
        <td>{{ $projects->description }}</td>
    </tr>
    <tr>
        <td>Created By</td>
        <td>:</td>
        <td value="{{ $projects->user->created_by }}">
            {{ ucfirst($projects->user->name) }}
        </td>
    </tr>
    <tr>
        <td>Created At</td>
        <td>:</td>
        <td>{{ $projects->created_at }}</td>
    </tr>
    <tr>
        <td>Updated At</td>
        <td>:</td>
        <td>{{ $projects->updated_at }}</td>
    </tr>
</table>
@endcard

@endsection
