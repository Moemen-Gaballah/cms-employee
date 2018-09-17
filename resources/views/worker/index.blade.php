@extends('main')
@section('title', 'category')
@section('content')
    <div class="container">
        <div class="row">
            <h2 style="margin-top: 6px; width: 50%; float:left;">Show Worker</h2>
            <a href="{{ url('/worker/create') }}" style="float:right;" class="btn btn-primary pull-right">Add New Worker</a>

            <h2>all sallary in Month: {{$allSallaryInMonth}} </h2>
            <h2>all sallary in year: {{$allSallaryInYear}} </h2>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>first Name</th>
                    <th>Last Name</th>
                    <th>Name Job</th>
                    <th>Sallary</th>
                    <th>age</th>
                    <th>gender</th>
                    <th>address</th>
                    <th>created at</th>
                    <th>Control Disable</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($workers as $worker)
                        <tr>
                            <td>{{$worker->id}}</td>
                            <td>{{$worker->first_name }}</td>
                            <td>{{$worker->last_name }}</td>
                            <td>{{$worker->name_job }}</td>
                            <td>{{$worker->sallary }}</td>
                            <td>{{$worker->age }}</td>
                            <td>{{$worker->gender }}</td>
                            <td>{{$worker->address }}</td>
                            <td>{{$worker->created_at}}</td>
                            <td>
                                <a href="{{ route('worker.edit', $worker->id) }}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                {{ Form::open(['route' => ['worker.destroy', $worker->id], 'method' => 'DELETE']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                                {{ Form::close() }}
                                {{--<a href="{{ route('category.destroy', $cat->id) }}" class="btn btn-xs btn-danger"> Delete</a>--}}
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection