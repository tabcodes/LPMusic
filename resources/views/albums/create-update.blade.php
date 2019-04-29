@extends('layouts.master') 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-dark text-white">
            <div class="card-header">
                Music Manager - {{ isset($album->id) ? "Update Album" : "Add New Album" }}
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form action="{{ isset($album->id) ? route('album.update',[$album->id]) : route('album.store') }}" method="post">
                            @csrf 
                            @isset($album)
                                @method('PUT') 
                            @endisset
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Album Name<span class="text-danger">*</span></label>
                                        @isset($album)
                                            <input required type="text" class="form-control" name="name" value="{{ old('name') ?: $album->name }}" placeholder="Enter name">
                                        @else
                                            <input required type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name">
                                        @endisset
                                        <small class="form-text">The name of the new album. Required.</small>
                                        @if($errors->has('name'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Date Recorded</label>
                                        @isset($album)
                                            <input type="date" class="form-control" name="recorded_date" value="{{ old('recorded_date') ?: $album->recorded_date}}">
                                        @else
                                            <input type="date" class="form-control" name="recorded_date" value="{{ old('recorded_date') }}">
                                        @endisset
                                        <small class="form-text">The date this album was recorded. Optional.</small>
                                        @if($errors->has('recorded_date'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('recorded_date') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name">Date Released</label>
                                            @isset($album)
                                                <input type="date" class="form-control" name="release_date" value="{{ old('release_date') ?: $album->release_date}}">
                                            @else
                                                <input type="date" class="form-control" name="release_date" value="{{ old('release_date') }}">
                                            @endisset
                                            <small class="form-text">The date this album was released. Optional.</small>
                                            @if($errors->has('release_date'))
                                                <div class="text-danger text-center">
                                                    {{ $errors->first('release_date') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Band / Arist <span class="text-danger">*</span></label>
                                        <select name="band_id" class="form-control">
                                                <option value="" {{ ( (null == old('band_id')) && (!isset($album->band->id)) ) ? 'selected' : '' }} disabled>Select a band...</option>
                                            @foreach(Band::all() as $band)
                                                @isset($album)
                                                    <option {{ ((old('band_id') == $band->id) || ($album->band->id == $band->id)) ? 'selected' : '' }} value="{{$band->id}}">{{$band->name}}</option>
                                                @else
                                                    <option {{ (old('band_id') == $band->id) ? 'selected' : '' }} value="{{$band->id}}">{{$band->name}}</option>
                                                @endisset
                                            @endforeach
                                        </select>
                                        <small class="form-text">The band or artist that created this album. Required.</small>
                                        @if($errors->has('label'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('label') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Album Label</label>
                                        @isset($album) 
                                            <input type="text" class="form-control" name="label" value="{{ old('label') ?: $album->label }}" placeholder="Enter label...">
                                        @else
                                            <input type="text" class="form-control" name="label" value="{{ old('label') }}" placeholder="Enter label...">
                                        @endisset
                                        <small class="form-text">The record label that produced this album. Optional.</small>
                                        @if($errors->has('label'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('label') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Track Count</label>
                                        @isset($album) 
                                            <input type="number" min=1 class="form-control" name="number_of_tracks" value="{{ old('number_of_tracks') ?: $album->number_of_tracks }}" placeholder="Enter track count...">
                                        @else
                                            <input type="number" min=1 class="form-control" name="number_of_tracks" value="{{ old('number_of_tracks') }}" placeholder="Enter track count...">
                                        @endisset
                                        <small class="form-text">Number of tracks on this album. Optional.</small>
                                        @if($errors->has('number_of_tracks'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('number_of_tracks') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Album Producer</label>
                                        @isset($album) 
                                            <input type="text" class="form-control" name="producer" value="{{ old('producer') ?: $album->producer }}" placeholder="Enter producer...">
                                        @else
                                            <input type="text" class="form-control" name="producer" value="{{ old('producer') }}" placeholder="Enter producer...">
                                        @endisset
                                        <small class="form-text">The producer of this album. Optional.</small>
                                        @if($errors->has('producer'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('producer') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name">Genre</label>
                                        @isset($album) 
                                            <input type="text" class="form-control" name="genre" value="{{ old('genre') ?: $album->genre }}" placeholder="Enter genre...">
                                        @else
                                            <input type="text" class="form-control" name="genre" value="{{ old('genre') }}" placeholder="Enter genre...">
                                        @endisset
                                        <small class="form-text">The music genre of this album. Optional.</small>
                                        @if($errors->has('genre'))
                                            <div class="text-danger text-center">
                                                {{ $errors->first('genre') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-info text-light">
                                            @isset($album->id)
                                                <i class="fa fa-save"></i> <span class="h5">Save Modifications</span>
                                            @else 
                                                <i class="fa fa-plus-square"></i> <span class="h5">Add New Album</span>
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