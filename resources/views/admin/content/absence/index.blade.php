@extends('admin.main')
@section('title', 'Show absence')
@section('content')
    <div class="container">
        <div class="row">
            <h2 style="margin-top: 6px; width: 50%; float:left;">Show Presence</h2>
            <a href="{{ url('/absence/create') }}" style="float:right;" class="btn btn-primary pull-right">Add New Presence</a>


            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>user name</th>
                    <th>date</th>
                    <th>presence</th>
                    <th>notes</th>
                    <th>Created_at</th>
                    <th>control</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($absences as $absence)
                        <tr>
                            <td>{{$absence->id}}</td>
                            <td>{{$absence->worker->first_name . " " . $absence->worker->last_name }}</td>
                            <td>{{$absence->date }}</td>
                            <td>{{$absence->presence }}</td>
                            <td>{{$absence->notes }}</td>
                            <td>{{$absence->created_at }}</td>
                            <td>
                                <a href="{{ route('absence.edit', $absence->id) }}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                {{ Form::open(['route' => ['absence.destroy', $absence->id], 'method' => 'DELETE']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
<script>
    $('select').change(function(){
    var url = $(this).val();
    window.location = url;
    });
</script>
@endsection