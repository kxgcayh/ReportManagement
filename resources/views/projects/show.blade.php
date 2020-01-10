@extends('layouts.app', (['title' => 'Management Project']))
@section('content')
@breadcrumb(['active' => 'Show'])
@slot('header')
{{ $reports->project['name'] }}
@endslot
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
                <th>#</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Machine</th>
                <th>Production</th>
                <th>Product</th>
                <th>Type</th>
                <th>Latest By</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $reports->name }}</td>
                <td>{{ $reports->brand['name'] }}</td>
                <td>{{ $reports->category['name'] }}</td>
                <td>{{ $reports->machine['name'] }}</td>
                <td>{{ $reports->production['name'] }}</td>
                <td>{{ $reports->product['name'] }}</td>
                <td>{{ $reports->type['name'] }}</td>
                <td><label class="badge badge-success">{{ $reports->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $reports->updatedBy['name'] }}</label>
                </td>
                <td>
                    @if($reports->is_active == 1)
                    <label class="badge badge-info">Active</label>
                    @else
                    <label class="badge badge-warning">Inactive</label>
                    @endif
                </td>
                <td>
                    <a name="edit" href="{{ route('reports.edit', $reports->id_report) }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('reports.destroy', $reports->id_report) }}" method="POST"
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
