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
    <fieldset disabled>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Created By</label>
                <input name="created_by" value="{{ $reports->createdBy['name'] }}" type="text"
                    class="form-control form-control-line" id="created_by">
                <span class="bar"></span>
                <small>{{ $reports->created_at }}</small>
            </div>
            <div class="form-group col-md-6">
                <label>Updated By</label>
                <input name="updated_by" value="{{ $reports->updatedBy['name'] }}" type="text" class="form-control"
                    id="updated_by">
                <span class="bar"></span>
                <small>{{ $reports->updated_at }}</small>
            </div>
        </div>
    </fieldset>
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="id_report">Report Name</label>
                <input name="name" value="{{ $reports->name }}" type="text" required
                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                <small class="form-control-feedback">
                    <p class="text-danger">{{ $errors->first('name') }}</p> Change Report Name
                </small>
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
                <small class="form-control-feedback">
                    <p class="text-danger">{{ $errors->first('brand_id') }}</p> Select brand
                </small>
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
                <small class="form-control-feedback">
                    <p class="text-danger">{{ $errors->first('category_id') }}</p> Select Category
                </small>
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
                <small class="form-control-feedback">
                    <p class="text-danger">{{ $errors->first('machine_id') }}</p> Select Machine
                </small>
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
                <small class="form-control-feedback">
                    <p class="text-danger">{{ $errors->first('production_id') }}</p> Select Production Place
                </small>
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
                <small class="form-control-feedback">
                    <p class="text-danger">{{ $errors->first('product_id') }}</p> Select Product Name
                </small>
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
                <small class="form-control-feedback">
                    <p class="text-danger">{{ $errors->first('project_id') }}</p> Select Project
                </small>
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
                <small class="form-control-feedback">
                    <p class="text-danger">{{ $errors->first('category_id') }}</p> Select Type
                </small>
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
