@extends('layouts.app', (['title' => 'Management Role']))
@section('content')
{{-- Bread crumb and right sidebar toggle --}}
@breadcrumb(['header' => 'Create Role', 'active' => 'Create'])
    @bcItem(['value' => 'Roles'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb
{{-- End Bread crumb and right sidebar toggle --}}
@card(['header' => ''])
    @ifAlert
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group form-material">
                <input placeholder="Name" class="form-control" name="name" type="text">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Permission:</strong><br/>
            <div class="form-group">
                @foreach($permission as $value)
                <input type="checkbox" class="check" value="{{ $value->id }}" name="permission[]" id="square-checkbox-{{ $value->id }}" data-checkbox="icheckbox_square-green">
                    <label for="square-checkbox-{{ $value->id }}">
                        {{$value->name}}
                    </label><br/>
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
    {!! Form::close() !!}
@endcard
@endsection
