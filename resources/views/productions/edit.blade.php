@extends('layouts.app', (['title' => 'Management Production']))

@section('content')

@breadcrumb(['header' => 'Edit Production', 'active' => 'Edit'])
    @bcItem(['value' => 'Productions'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb

<div class="row">
    @cardbox(['header' => ''])
        @ifAlert
        <form role="form" action="{{ route('productions.update', $productions->id_production) }}" method="POST" class="form-material">
            @method('PUT')
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="id_production">Nama Production</label>
                <input id="id_production" type="text" name="name" required
                    value="{{ $productions->name }}"
                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label for="location_id">Lokasi</label>
                <select name="location_id" id="location_id" required
                class="form-control {{ $errors->has('location_id') ? 'is-invalid':'' }}">
                    <option value=""></option>
                    @foreach ($locations as $locs)
                        <option value="{{ $locs->id_location }}" {{ $locs->id_location == $productions->location_id ? 'selected':'' }}>
                            {{ ucfirst($locs->name) }}
                        </option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('location_id') }}</p>
            </div>
            <div class="form-group pull-right">
                <button class="btn waves-effect waves-light btn-primary">
                    <i class="fa fa-send"></i> Save
                </button>
                <a href="{{ route('productions.index') }}" class="btn waves-effect waves-light btn-info">Back </a>
            </div>
        </form>
    @endcardbox
</div>
@endsection
