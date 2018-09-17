@extends('admin.main')
@section('title', 'Show All Salary')
@section('content')
    <div class="container">
        <div class="row">
            <h2 style="margin-top: 6px; width: 50%; float:left;">Show Sallay</h2>
            <a href="{{ url('/sallary/create') }}" style="float:right;" class="btn btn-primary pull-right">Add New Sallary</a>

            <h2>Salary Paid{{ $count }}</h2>

            <select name="month">
                <option value="">...</option>
                <option value="/sallary/january">January</option>
                <option value="/sallary/february">February</option>
                <option value="/sallary/march">March</option>
                <option value="/sallary/april">April</option>
                <option value="/sallary/may">May</option>
                <option value="/sallary/june">June</option>
                <option value="/sallary/july">July</option>
                <option value="/sallary/august">August</option>
                <option value="/sallary/september">September</option>
                <option value="/sallary/october">October</option>
                <option value="/sallary/november">November</option>
                <option value="/sallary/december">December</option>
            </select>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>user name</th>
                    <th>user salary</th>
                    <th>month</th>
                    <th>control</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($sallaries as $sallary)
                        <tr>
                            <td>{{$sallary->id}}</td>
                            <td>{{$sallary->worker->first_name . " " . $sallary->worker->last_name }}</td>
                            <td>{{$sallary->worker->sallary }}</td>
                            <td>{{$sallary->month }}</td>
                            <td>
                                <a href="{{ route('salaryforperson', $sallary->worker->id) }}" class="btn btn-sm btn-primary">
                                    Show
                                </a>
                                <a href="{{ route('salaryforperson', $sallary->id) }}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                {{ Form::open(['route' => ['sallary.destroy', $sallary->id], 'method' => 'DELETE']) }}
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