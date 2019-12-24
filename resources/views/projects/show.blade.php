@extends('layouts.app', (['title' => 'Management Project']))
@section('content')
@breadcrumb(['header' => 'Detail Project', 'active' => 'Show'])
@bcItem(['value' => 'Project'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert

@card
@slot('header')
<a class="btn btn-primary pull-left" href="{{ route('reports.create') }}"><i class="mdi mdi-plus-circle-outline"></i>
    Create Report</a>
<a class="btn btn-info pull-right" href="{{ route('projects.index') }}"> Back</a>
@endslot<br><br>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Description</th>
                <th>Created and Updated By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $projects->name }}</td>
                <td>{{ str_limit($projects->description, 70) }}</td>
                <td><label class="badge badge-success">{{ $projects->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $projects->updatedBy['name'] }}</label>
                </td>
                <td>
                    <a name="edit" href="{{ route('projects.edit', $projects->id_project) }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('projects.destroy', $projects->id_project) }}" method="POST"
                        style="display:inline">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" name="delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endcard

@endsection
