@extends('admin.main')
@section('title', 'Add Worker Parttime')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Parttime</div>
                    <br>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'parttime.store', 'method' => 'POST']) !!}

                        <select name="worker_id">
                            <option value="">Choose User</option>
                            @foreach($workers as $worker)
                            <option value="{{$worker->id}}">{{ $worker->first_name . " " . $worker->last_name  }}</option>
                            @endforeach
                        </select>

                        <div class="form-group">
                            {!! Form::label('timespend', 'Timespend'); !!}
                            {!!  Form::number('timespend', null); !!}
                        </div>


                        {!! Form::submit('submit', ['class' => 'btn btn-primary']); !!}
                        {!! Form::close() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
