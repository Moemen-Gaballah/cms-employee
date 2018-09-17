@extends('main')
@section('title', 'Create Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Worker</div>
                    <br>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'worker.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name'); !!}
                            {!! Form::text('first_name', null, ['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name'); !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('name_job', 'Name Job'); !!}
                            {!! Form::text('name_job', null, ['class' => 'form-control']); !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('sallary', 'Sallary'); !!}
                            {!! Form::text('sallary', null, ['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('age', 'Age'); !!}
                            {!! Form::text('age', null, ['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'Gender'); !!}
                            {!! Form::select('gender',['Female' => 'Female', 'Male' =>'Male'], null,['class' => 'form-control','placeholder' => 'Choose Gender...'] ); !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('address', 'Address'); !!}
                            {!! Form::text('address', null, ['class' => 'form-control']); !!}
                        </div>

                        {!! Form::submit('Create', ['class' => 'btn btn-primary']); !!}
                        {!! Form::close() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
