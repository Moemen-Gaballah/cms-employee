@extends('main')
@section('title', 'Create Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Salary to User</div>
                    <br>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'sallary.store', 'method' => 'POST']) !!}

                        <select name="worker_id">
                            @foreach($workers as $worker)
                            <option value="{{$worker->id}}">{{ $worker->first_name . " " . $worker->last_name  }}</option>
                            @endforeach
                        </select>

                        <select name="month">
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </select>

                        {!! Form::submit('give salary', ['class' => 'btn btn-primary']); !!}
                        {!! Form::close() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
