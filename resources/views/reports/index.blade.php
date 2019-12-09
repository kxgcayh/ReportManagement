@extends('layouts.app', (['title' => 'Management Report']))

@section('content')

@breadcrumb(['header' => 'Report List', 'active' => 'Show'])
@bcItem(['value' => 'Report']) @bcItem(['value' => 'Projects']) @bcItem(['value' => 'Data Master'])
@endbreadcrumb

@card
@ifAlert
@slot('header')
<a href="{{ route('reports.create') }}" class="btn waves-effect waves-light btn-primary float-right"><i
        class="fa fa-edit"></i>
    Create Report </a>
@endslot
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reports as $report)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $report->name }}</td>
                <td>{{ $report->approval }}</td>
                <td>{{ $report->brand['name'] }}</td>
                <td>{{ $report->category['name'] }}</td>
                <td>{{ $report->project['name'] }}</td>
                <td>{{ $report->type['name'] }}</td>
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
