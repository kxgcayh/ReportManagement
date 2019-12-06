@extends('layouts.app', (['title' => 'Management Project']))
@section('content')
@breadcrumb(['header' => 'Management Project', 'active' => 'Projects'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
@include('inc.ifalert')
@cwidget(['widget' => 'create', 'title' => 'Create Project'])
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
@endcwidget
@card(['header' => 'Project List'])
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ str_limit($project->description, 70) }}</td>
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
@endsection
