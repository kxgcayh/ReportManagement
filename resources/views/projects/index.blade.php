@extends('layouts.app', (['title' => 'Management Project']))

@section('content')
@breadcrumb(['header' => 'Management Project', 'active' => 'Projects'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Project'])
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@endslot
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Description</th>
                <th>Created and Updated By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ str_limit($project->description, 70) }}</td>
                <td><label class="badge badge-success">{{ $project->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $project->updatedBy['name'] }}</label>
                </td>
                <td>
                    <a class="btn btn-info" name="show" href="{{ route('projects.show',$project->id_project) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a name="edit" href="{{ route('projects.edit', $project->id_project) }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('projects.destroy', $project->id_project) }}" method="POST"
                        style="display:inline">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" name="delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data Project</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $projects->links() }}
@endcard

@modal(['id' => 'inactive', 'size' => 'lg', 'color' => 'info', 'title' => 'Inactive Data List'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Project</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inactive as $projs)
            <tr>
                <td>{{ $projs->name }}</td>
                <td>{{ $projs->createdBy['name'] }}</td>
                <td>{{ $projs->created_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data Project</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Project'])
<form role="form" action="{{ route('projects.store') }}" method="POST" class="form-material">
    @csrf
    @can('Manage Projects')
    <div class="form-group">
        <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
            placeholder="Project Name">
    </div>
    <div class="form-group">
        <textarea name="description" id="description" cols="5" rows="5"
            class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"
            placeholder="Description"></textarea>
    </div>
    @else
    <div class="form-group">
        <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
            placeholder="Project Name" disabled>
    </div>
    <div class="form-group">
        <textarea name="description" id="description" cols="5" rows="5"
            class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" placeholder="Description"
            disabled></textarea>
    </div>
    @endcan
    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right"><i
            class="mdi mdi-loupe"></i> Submit</button>
</form>
@endmodal

@endsection
