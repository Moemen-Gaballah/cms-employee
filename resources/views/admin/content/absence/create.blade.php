@extends('admin.main')
@section('title', 'Add Worker absence')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Presence</div>
                    <br>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'absence.store', 'method' => 'POST']) !!}

                        <select name="worker_id">
                            <option value="">Choose User</option>
                            @foreach($workers as $worker)
                            <option value="{{$worker->id}}">{{ $worker->first_name . " " . $worker->last_name  }}</option>
                            @endforeach
                        </select>

                        <div class="form-group">
                            {!! Form::label('presence', 'Presence'); !!}
                            {!! Form::select('presence',['absence' => 'absence', 'presence' =>'Presence'], null,['class' => 'form-control','placeholder' => 'Choose Gender...'] ); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('notes', 'Notes'); !!}
                            {!! Form::textarea('notes', null , ['class' => 'form-control']); !!}
                        </div>


                        {!! Form::submit('submit', ['class' => 'btn btn-primary']); !!}
                        {!! Form::close() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
