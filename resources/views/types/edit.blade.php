@extends('layouts.app', (['title' => 'Management Type']))
@section('content')
@breadcrumb(['header' => 'Edit Type', 'active' => 'Edit'])
    @bcItem(['value' => 'Types'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb

<div class="row">
    @cardbox(['header' => ''])
        @ifAlert
        <form role="form" action="{{ route('types.update', $types->id_type) }}" method="POST" class="form-material">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <input name="name" value="{{ $types->name }}" type="text" id="id_type" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Type">
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                <a href="{{ route('types.index') }}" class="btn btn-info waves-effect waves-light m-r-10">Cancel</a>
            </div>
        </form>
    @endcardbox
</div>
@endsection
