@extends('layouts.master') 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-dark text-white">
            <div class="card-header">
                Music Manager - Band Details
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <table class="table table-striped table-dark ">
                            <tbody>
                                <tr>
                                    <th>Band Name</th>
                                    <td>{{ $band->name }}</td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td class="{{ (!$band->start_date) ? 'text-muted' : ''}}">{{ ($band->start_date) ? $band->start_date : "[N/A]" }}</td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td class="{{ (!$band->website) ? 'text-muted' : ''}}">
                                        @isset($band->website)
                                            <a href="{{ $band->website }}" target="_new">{{ $band->website }} <i class='fa fa-external-link-alt'></i></a>
                                        @else
                                            [N/A]
                                         @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $band->activeStatus() }}</td>
                                </tr>
                                <tr>
                                    <th>Actions</th>
                                    <td>
                                        <a href="{{ route('band.edit', $band->id) }}" class="btn btn-info btn-block my-1">
                                            <i class="fa fa-edit"></i> Modify
                                        </a>
                                        <form action="{{ route('band.destroy', $band->id) }}" method="POST" class="my-1">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-block">
                                                <i class="fa fa-times-circle"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @if($band->albumCount() > 0)
                                <tr>
                                    <th>Albums ({{$band->albumCount()}})</th>
                                    <td>
                                        <table class="table table-dark table-hover">
                                            <thead>
                                                <th>Name</th>
                                                <th>Details</th>
                                            </thead>
                                            <tbody>
                                                @foreach($band->albums as $album) 
                                                    <tr>
                                                        <td>{{$album->name}}</td>
                                                        <td>
                                                            <a href="{{ route('album.show', $album->id)}}">
                                                                <i class="fa fa-2x fa-info-circle"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                
                                @endif

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