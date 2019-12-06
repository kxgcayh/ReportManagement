@extends('layouts.app', (['title' => 'Management Report']))

@section('content')

@breadcrumb(['header' => 'Report List', 'active' => 'Show'])
@bcItem(['value' => 'Report'])
@bcItem(['value' => 'Projects'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@card(['header' => 'Reports List'])
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Approval</th>
                <th>Brand Name</th>
                <th>Category Name</th>
                <th>Project Name</th>
                <th>Type</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reports as $report)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $report->name }}</td>
                <td>{{ $report->approval }}</td>
                <td>{{ $report->brand_id }}</td>
                <td>{{ $report->category_id }}</td>
                <td>{{ $report->project_id }}</td>
                <td>{{ $report->type_id }}</td>
                <td>{{ $report->created_by }}</td>
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
                <td colspan="4" class="text-center">Tidak ada data Report</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $reports->links() }}
@endcard

@endsection
