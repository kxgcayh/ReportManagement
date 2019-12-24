@extends('layouts.app', (['title' => 'Management Report']))

@section('content')

@breadcrumb(['header' => 'Report List', 'active' => 'Show'])
@bcItem(['value' => 'Report']) @bcItem(['value' => 'Projects']) @bcItem(['value' => 'Data Master'])
@endbreadcrumb

@card
@ifAlert
@slot('header')
<a href="{{ route('reports.create') }}" class="btn waves-effect waves-light btn-primary"><i
        class="mdi mdi-plus-circle-outline"></i>
    Create Report </a>
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@endslot
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Brand Name</th>
                <th>Category Name</th>
                <th>Project Name</th>
                <th>Type</th>
                <th>Created and Updated By</th>
                <th>Action</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($reports as $report)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $report->name }}</td>
                <td>{{ $report->brand['name'] }}</td>
                <td>{{ $report->category['name'] }}</td>
                <td>{{ $report->project['name'] }}</td>
                <td>{{ $report->type['name'] }}</td>
                <td><label class="badge badge-success">{{ $report->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $report->updatedBy['name'] }}</label>
                </td>
                <td>
                    <a class="btn btn-info" name="show" href="{{ route('reports.show',$report->id_report) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a name="edit" href="{{ route('reports.edit', $report->id_report) }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('reports.destroy', $report->id_report) }}" method="POST"
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
                <td colspan="8" class="text-center">Tidak ada data Report</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_reports as $report)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $report->name }}</td>
                <td>{{ $report->brand['name'] }}</td>
                <td>{{ $report->category['name'] }}</td>
                <td>{{ $report->project['name'] }}</td>
                <td>{{ $report->type['name'] }}</td>
                <td><label class="badge badge-success">{{ $report->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $report->updatedBy['name'] }}</label>
                </td>
                <td>
                    <a class="btn btn-info" name="show" href="{{ route('reports.show',$report->id_report) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a name="edit" href="{{ route('reports.edit', $report->id_report) }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('reports.destroy', $report->id_report) }}" method="POST"
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
                <td colspan="8" class="text-center">Tidak ada data Report</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
</div>
{{ $reports->links() }}

@modal(['id' => 'inactive', 'size' => 'lg', 'color' => 'info', 'title' => 'Inactive Data List'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Report</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inactive as $reps)
            <tr>
                <td>{{ $reps->name }}</td>
                <td>{{ $reps->createdBy['name'] }}</td>
                <td>{{ $reps->created_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data Report</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@endcard

@endsection
