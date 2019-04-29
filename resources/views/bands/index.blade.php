@extends('layouts.master') 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-dark text-white">
            <div class="card-header">
                Music Manager - Bands List
            </div>
    @include('partials.flash-status')
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <a href="{{ route('band.create') }}" class="col-md-10 btn btn-info text-light">
                            <i class="fa fa-plus-square fa-2x"></i> <span class="h4">Add New Band</span>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="col-lg-10">
                        <table class="dataTable table table-striped table-dark text-center" id="band-list-table">
                            <thead>
                                <tr>
                                    <th>Band Name</th>
                                    <th>Website</th>
                                    <th>Start Date</th>
                                    <th>Status</th>
                                    <th>Album Count</th>
                                    <th>Details</th>
                                    <th>Modify</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bands as $band)
                                <tr>
                                    <td>{{ $band->name }}</td>
                                    <td>{{ $band->website ?? "[ N/A ]"}}</td>
                                    <td>{{ $band->start_date ?? "[ N/A ]"}}</td>
                                    <td>{{ $band->activeStatus() }}</td>
                                    <td>
                                        <h3 class="">
                                            <span class="badge badge-secondary">{{ $band->albumCount() }}</span>
                                        </h3>
                                    </td>
                                    <td>
                                        <a href="{{ route('band.show', $band->id)}}">
                                            <i class="fa fa-2x fa-info-circle"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('band.edit', $band->id)}}">
                                            <i class="fa fa-2x fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('band.destroy', $band->id) }}" method="POST">
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