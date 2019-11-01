@extends('layouts.app')
@section('content')
{{-- Bread crumb and right sidebar toggle --}}
@breadcumb(['header' => 'Create Roles'])
    @breadc_item(['active' => 'Role Management'])
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb
{{-- End Bread crumb and right sidebar toggle --}}
@card
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    @slot('header')
        <a class="btn btn-success" href="{{ route('roles.index') }}"> Back</a>
    @endslot
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong></strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
        </div>
    </div>
    {!! Form::close() !!}
@endcard
@endsection
