@extends('admin.main')
@section('title', 'Show absence')
@section('content')
    <div class="container">
        <div class="row">
            <h2 style="margin-top: 6px; width: 50%; float:left;">Show Parttime</h2>
            <a href="{{ url('/parttime/create') }}" style="float:right;" class="btn btn-primary pull-right">Add Parttime</a>


            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>user name</th>
                    <th>timespend</th>
                    <th>Created_at</th>
                    <th>control</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($parttimes as $parttime)
                        <tr>
                            <td>{{$parttime->id}}</td>
                            <td>{{$parttime->worker->first_name . " " . $parttime->worker->last_name }}</td>
                            <td>{{$parttime->timespend }}</td>
                            <td>{{$parttime->created_at }}</td>
                            <td>
                                <a href="{{ route('parttime.edit', $parttime->id) }}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                {{ Form::open(['route' => ['parttime.destroy', $parttime->id], 'method' => 'DELETE']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection