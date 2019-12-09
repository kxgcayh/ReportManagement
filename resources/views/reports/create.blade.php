@extends('layouts.app', (['title' => 'Management Report']))

@section('content')

@breadcrumb(['header' => 'Report', 'active' => 'Show'])
@bcItem(['value' => 'Report'])
@bcItem(['value' => 'Projects'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@card(['header' => 'Create Report'])
<form role="form" action="{{ route('reports.store') }}" method="post">
    @csrf
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group form-material">
                <label class="control-label" for="id_report">Report Name</label>
                <input type="text" id="id_report" name="name"
                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                <p class="text-danger">{{ $errors->first('name') }}</p>
                <small class="form-control-feedback"> Write your report name here </small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-material">
                <label class="control-label" for="brand_id">Brand Name</label>
                <select name="brand_id" id="brand_id" required
                    class="form-control {{ $errors->has('brand_id') ? 'is-invalid':'' }}">
                    @foreach ($brands as $item)
                    <option value="{{ $item->id_brand }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                <small class="form-control-feedback"> Select brand </small>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group form-material">
                <label class="control-label" for="category_id">Category Name</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $item)
                    <option value="{{ $item->id_category }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                <small class="form-control-feedback"> Select Category </small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="project_id" class="control-label">Project Name</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach ($projects as $item)
                    <option value="{{ $item->id_project }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                <small class="form-control-feedback"> Select Project </small>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="type_id" class="control-label">Type Name</label>
                <select name="type_id" id="type_id" class="form-control">
                    @foreach ($types as $item)
                    <option value="{{ $item->id_type }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                <small class="form-control-feedback"> Select Type </small>
            </div>
        </div>
        <div class=" col-md-6">
            <label for="input-file-now">Please input file</label><br>
            <input type="file" id="input-file-now" class="dropify" />
        </div>
    </div>
    <div class="form-group pull-right">
        <button class="btn waves-effect waves-light btn-primary">
            <i class="fa fa-send"></i> Save
        </button>
        <a href="{{ route('reports.index') }}" class="btn waves-effect waves-light btn-info">Back </a>
    </div>
</form>
@endcard
@endsection
