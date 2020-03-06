@extends('layouts.app', (['title' => 'Management Type']))
@section('content')
@breadcrumb(['header' => 'Edit Type', 'active' => 'Edit'])
@bcItem(['value' => 'Types'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert

@card(['header' => ''])
<form role="form" action="{{ route('types.update', $types->id_type) }}" method="POST" class="floating-labels">
    @csrf
    <input type="hidden" name="_method" value="PUT">    
    <div class="form-group">
        <label>Type Name</label>
        <input name="name" value="{{ $types->name }}" type="text" id="id_type"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        <span class="bar"></span>
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Update</button>
        <a href="{{ route('types.index') }}" class="btn btn-info waves-effect waves-light m-r-10">Cancel</a>
    </div>
</form>
@endcard
</div>
@endsection
