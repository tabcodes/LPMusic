@extends('layouts.master') 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-dark text-white">
            <div class="card-header">
                Music Manager - Album Details
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <table class="table table-striped table-dark ">
                            <tbody>
                                <tr>
                                    <th>Album Name</th>
                                    <td>{{ $album->name }}</td>
                                </tr>
                                <tr>
                                    <th>Band Name</th>
                                    <td>
                                        <a href="{{ route('band.show', $album->band->id) }}">
                                            <i class="fa fa-info-circle"></i> {{ $album->band->name }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date Recorded</th>
                                    <td class="{{ (!$album->recorded_date) ? 'text-muted' : ''}}">{{ ($album->recorded_date) ? $album->recorded_date : "[N/A]" }}</td>
                                </tr>
                                <tr>
                                    <th>Date Released</th>
                                    <td class="{{ (!$album->release_date) ? 'text-muted' : ''}}">{{ ($album->release_date) ? $album->release_date : "[N/A]" }}</td>
                                </tr>
                                <tr>
                                    <th>Track Count</th>
                                    <td class="{{ (!$album->number_of_tracks) ? 'text-muted' : ''}}">{{ ($album->number_of_tracks) ? $album->number_of_tracks : "[N/A]" }}</td>
                                </tr>
                                <tr>
                                    <th>Label</th>
                                    <td class="{{ (!$album->label) ? 'text-muted' : ''}}">{{ ($album->label) ? $album->label : "[N/A]" }}</td>
                                </tr>
                                <tr>
                                    <th>Producer</th>
                                    <td class="{{ (!$album->producer) ? 'text-muted' : ''}}">{{ ($album->producer) ? $album->producer : "[N/A]" }}</td>
                                </tr>
                                <tr>
                                    <th>Genre</th>
                                    <td class="{{ (!$album->genre) ? 'text-muted' : ''}}">{{ ($album->genre) ? $album->genre : "[N/A]" }}</td>
                                </tr>
                                <tr>
                                    <th>Actions</th>
                                    <td>
                                        <a href="{{ route('album.edit', $album->id) }}" class="btn btn-info my-1">
                                            <i class="fa fa-edit"></i> Modify
                                        </a>
                                        <form action="{{ route('album.destroy', $album->id) }}" method="POST" class="my-1">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-times-circle"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection