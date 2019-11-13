@extends('layouts.app')

@section('title')
    <title>Edit Location</title>
@endsection

@section('content')
@breadcumb(['header' => 'Edit Location'])
    @breadc_item(['active' => 'Edit'])
    @breadc_active Location @endbreadc_active
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb

<div class="row">
    <div class="col-md-6">
        @cardbox(['header' => 'Edit Location'])
            @include('inc.ifalert')
            <form role="form" action="{{ route('locations.update', $locations->id_location) }}" method="POST" class="floating-labels">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="id_location">Location</label>
                    <input name="name" value="{{ $locations->name }}" type="text" class="form-control" id="id_location" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}">{{ $locations->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                <button href="{{ route('locations.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</button>
            </form>
        @endcardbox
    </div>
</div>
@endsection
