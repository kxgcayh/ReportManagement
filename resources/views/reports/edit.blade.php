@extends('layouts.app', (['title' => 'Management Report']))
@section('content')
@breadcrumb(['header' => 'Edit Report', 'active' => 'Edit'])
@bcItem(['value' => 'Reports'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert
@card(['header' => ''])
<form role="form" action="{{ route('reports.update', $reports->id_report) }}" method="POST" class="form-material"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="id_report">Report Name</label>
                <input name="name" value="{{ $reports->name }}" type="text" required
                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="brand_id">Brand Name</label>
                <select name="brand_id" id="brand_id" required
                    class="form-control {{ $errors->has('brand_id') ? 'is-invalid':'' }}">
                    <option value=""></option>
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id_brand }}" {{ $brand->id_brand == $reports->brand_id ? 'selected':'' }}>
                        {{ ucfirst($brand->name) }}
                    </option>
                    @endforeach
                </select>
                <span class="bar"></span>                
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="category_id">Category Name</label>
                <select name="category_id" id="category_id" required
                    class="form-control {{ $errors->has('category_id') ? 'is-invalid':'' }}">
                    <option></option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id_category }}"
                        {{ $category->id_category == $reports->category_id ? 'selected':'' }}>
                        {{ ucfirst($category->name) }}
                    </option>
                    @endforeach
                </select>                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="machine_id" class="control-label">Machine Name</label>
                <select name="machine_id" id="machine_id" class="form-control">
                    <option></option>
                    @foreach ($machines as $item)
                    <option value="{{ $item->id_machine }}"
                        {{ $item->id_machine == $reports->machine_id ? 'selected':'' }}>
                        {{ ucfirst($item->name) }}
                    </option>
                    @endforeach
                </select>                
            </div>
        </div>
    </div>
    {{-- Production and Product --}}
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="production_id" class="control-label">Production Name</label>
                <select name="production_id" id="production_id" class="form-control">
                    <option></option>
                    @foreach ($productions as $item)
                    <option value="{{ $item->id_production }}"
                        {{ $item->id_production == $reports->production_id ? 'selected':'' }}>
                        {{ ucfirst($item->name) }}
                    </option>
                    @endforeach
                </select>                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="product_id" class="control-label">Product Name</label>
                <select name="product_id" id="product_id" class="form-control">
                    <option></option>
                    @foreach ($products as $item)
                    <option value="{{ $item->id_product }}"
                        {{ $item->id_product == $reports->product_id ? 'selected':'' }}>
                        {{ ucfirst($item->name) }}
                    </option>
                    @endforeach
                </select>                
            </div>
        </div>
    </div>
    <div class="row pt-3">
        {{-- Project --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="project_id" class="control-label">Project Name</label>
                <select name="project_id" id="project_id" required
                    class="form-control {{ $errors->has('project_id') ? 'is-invalid':'' }}">
                    <option></option>
                    @foreach ($projects as $project)
                    <option value="{{ $project->id_project }}"
                        {{ $project->id_project == $reports->project_id ? 'selected':'' }}>
                        {{ ucfirst($project->name) }}
                    </option>
                    @endforeach
                </select>                
            </div>
        </div>
        {{-- endProject --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="type_id" class="control-label">Type Name</label>
                <select name="type_id" id="type_id" class="form-control">
                    <option></option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id_type }}" {{ $type->id_type == $reports->type_id ? 'selected':'' }}>
                        {{ ucfirst($type->name) }}</option>
                    @endforeach
                </select>                
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-6">
                <label for="file">Please input file</label><br>
                <input type="file" id="file" name="file" class="dropify" />
            </div>
        </div>
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Update</button>
        <a href="{{ route('reports.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</a>
    </div>
</form>
@endcard

@endsection
