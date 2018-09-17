@extends('admin.main')
@section('title', 'Add Worker Absence')
@section('content')
    <div class="container">
        <div class="row">
            <h2 style="margin-top: 6px; width: 50%; float:left;">Show Sallary</h2>
            <a href="{{ url('/sallary/create') }}" style="float:right;" class="btn btn-primary pull-right">Add New Sallary</a>

            <h2>Salary In This month{{ $count }}</h2>
            <select name="month">
                <option value=""> ... Select Month</option>
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

            {{--<h2>Total salary in this month: {{ $TotalaSalaryInThisMonth }}</h2>--}}

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
                    @foreach($salaryInmonth as $salary_month)
                        <tr>
                            <td>{{$salary_month->id}}</td>
                            <td>{{$salary_month->worker->first_name . " " . $salary_month->worker->last_name }}</td>
                            <td>{{$salary_month->worker->sallary }}</td>
                            <td>{{$salary_month->month }}</td>
                            <td>
                                <a href="{{ route('sallary.edit', $salary_month->id) }}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                {{ Form::open(['route' => ['sallary.destroy', $salary_month->id], 'method' => 'DELETE']) }}
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