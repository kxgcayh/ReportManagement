@extends('layouts.app', (['title' => 'Management Report']))

@section('content')

@breadcrumb(['header' => 'Report List', 'active' => 'Show'])
@bcItem(['value' => 'Report']) @bcItem(['value' => 'Projects']) @bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert

@card
@slot('header')
<a href="{{ route('reports.create') }}" class="btn waves-effect waves-light btn-primary"><i
        class="mdi mdi-plus-circle-outline"></i>
    Create Report </a>
@role('Manager')
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'trash', 'icon' => 'mdi mdi-information-outline',
'name' => 'Recycle Bin'])
@endrole
@endslot
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Machine</th>
                <th>Production</th>
                <th>Product</th>
                <th>Project</th>
                <th>Type</th>
                <th>LatestBy</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reports as $report)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $report->name }}</td>
                <td>{{ $report->brand['name'] }}</td>
                <td>{{ $report->category['name'] }}</td>
                <td>{{ $report->machine['name'] }}</td>
                <td>{{ $report->production['name'] }}</td>
                <td>{{ $report->product['name'] }}</td>
                <td>{{ $report->project['name'] }}</td>
                <td>{{ $report->type['name'] }}</td>
                <td>
                    @if($report->updatedBy['name'] == null)
                    <label class="badge badge-info">{{ $report->createdBy['name'] }}</label>
                    @else
                    <label class="badge badge-info">{{ $report->updatedBy['name'] }}</label>
                    @endif
                </td>
                <td>
                    @if($report->is_active == 1)
                    <label class="badge badge-info">Active</label>
                    @else
                    <label class="badge badge-danger">Inactive</label>
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Menu
                        </button>
                        <div class="dropdown-menu">
                            <a name="edit" href="{{ route('reports.edit', $report->id_report) }}"
                                class="dropdown-item">Edit</a>
                            <form action="{{ route('reports.destroy', $report->id_report) }}" method="POST"
                                style="display:inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="dropdown-item" name="delete">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center">Tidak ada data Report</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $reports->links() }}

@endcard

@modal(['id' => 'trash', 'size' => 'lg', 'color' => 'warning', 'title' => 'Report Bin'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Report</th>
                <th>Deleted At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashed as $report)
            <tr>
                <td>{{ $report->name }}</td>
                <td>{{ $report->deleted_at }}</td>
                <td>
                    <a href="/reports/restore/{{ $report->id_report }}" class="btn btn-success btn-sm">Restore</a>
                    <a href="/reports/forceDelete/{{ $report->id_report }}" class="btn btn-danger btn-sm">Force
                        Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data Report</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal
@endsection
