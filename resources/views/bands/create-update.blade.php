@extends('layouts.master') 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-dark text-white">
            <div class="card-header">
                Music Manager - {{ isset($band->id) ? "Update Band" : "Add New Band" }}
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form action="{{ isset($band->id) ? route('band.update',[$band->id]) : route('band.store') }}" method="post">
                            @csrf 
                            @isset($band)
                                @method('PUT') 
                            @endisset
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Band Name<span class="text-danger">*</span></label>
                                        @isset($band)
                                            <input required type="text" class="form-control" name="name" value="{{ old('name') ?: $band->name }}" placeholder="Enter name">
                                        @else
                                            <input required type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name">
                                        @endisset
                                        <small class="form-text">The name of the new band. Required.</small>
                                        @if($errors->has('name'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Start Date</label>
                                        @isset($band)
                                            <input type="date" class="form-control" name="start_date" value="{{ old('start_date') ?: $band->start_date}}">
                                        @else
                                            <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
                                        @endisset
                                        <small class="form-text">The date this band was formed. Optional.</small>
                                        @if($errors->has('start_date'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('start_date') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Band Website</label>
                                        @isset($band) 
                                            <input type="text" class="form-control" name="website" value="{{ old('website') ?: $band->website }}" placeholder="http://example.com">
                                        @else
                                            <input type="text" class="form-control" name="website" value="{{ old('website') }}" placeholder="http://example.com">
                                        @endisset
                                        <small class="form-text">The URL of this band's website. Optional.</small>
                                        @if($errors->has('website'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('website') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Current Status</label>
                                        <select name="still_active" class="form-control">
                                                @isset($band)
                                                    <option {{ (( $band->still_active == 0) || (old('still_active') == 0)) ? 'selected' : ''}} value="0">Inactive</option>
                                                    <option {{ (( $band->still_active == 1) || (old('still_active') == 1)) ? 'selected' : ''}} value="1">Active</option>
                                                @else
                                                    <option {{ (old('still_active') == 0) ? 'selected' : ''}} value="0">Inactive</option>
                                                    <option {{ (old('still_active') == 1) ? 'selected' : '' }} value="1">Active</option>
                                                @endisset
                                            </select>
                                        <small class="form-text">Current activity status of this band.</small>
                                        @if($errors->has('still_active'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('still_active') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-info text-light">
                                            @isset($band->id)
                                                <i class="fa fa-save"></i> <span class="h5">Save Modifications</span>
                                            @else 
                                                <i class="fa fa-plus-square"></i> <span class="h5">Add New Band</span>
                                            @endisset
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</div>
@endsection