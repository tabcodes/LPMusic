@extends('layouts.master') 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-dark text-white">
            <div class="card-header">
                Music Manager - Album Collection
            </div>
            
            @include('partials.flash-status')
            
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <a href="{{ route('album.create') }}" class="col-md-10 btn btn-info text-light">
                            <i class="fa fa-plus-square fa-2x"></i> <span class="h4">Add New Album</span>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="col-lg-10">
                        <table class="dataTable table table-striped table-dark text-center" data-filter-by="band name" id="album-list-table">
                            <thead>
                                <tr>
                                    <th>Album Name</th>
                                    <th>Band Name</th>
                                    <th>Date Recorded</th>
                                    <th>Date Released</th>
                                    <th>Track Count</th>
                                    <th>Label</th>
                                    <th>Producer</th>
                                    <th>Genre</th>
                                    <th>Details</th>
                                    <th>Modify</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($albums as $album)
                                <tr>
                                    <td>{{ $album->name }}</td>
                                    <td>{{ $album->band->name }}</td>
                                    <td>{{ $album->recorded_date ?? "[ N/A ]"}}</td>
                                    <td>{{ $album->release_date ?? "[ N/A ]"}}</td>
                                    <td>
                                        @isset($album->number_of_tracks)
                                            <h3 class="">
                                                    <span class="badge badge-secondary">{{ $album->number_of_tracks }}</span>
                                            </h3>
                                        @else 
                                            [ N/A ]
                                        @endisset
                                    </td>        
                                    <td>{{ $album->label ?? "[ N/A ]"}}</td>
                                    <td>{{ $album->producer ?? "[ N/A ]"}}</td>
                                    <td>{{ $album->genre ?? "[ N/A ]"}}</td>
                                    <td>
                                        <a href="{{ route('album.show', $album->id)}}">
                                            <i class="fa fa-2x fa-info-circle"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('album.edit', $album->id)}}">
                                            <i class="fa fa-2x fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('album.destroy', $album->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link py-0 my-0">
                                                    <i class="fa fa-2x fa-times-circle text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection