@extends('admin.main')
@section('title', 'Show Worker')
@section('content')

    <a href="{{ route('downloadfile', $worker) }}">Download PDF</a>

    {{--<!-- Start table Show  -->--}}

    <div class="container">
        <a href="{{ url('/worker/create') }}" style="float:right;" class="btn btn-primary pull-right">Add New Worker</a>
        <div class="row">

            <div>
                <h3>about user</h3>
                <P>#: {{ $worker->id}} username: {{ $worker->first_name }} {{ $worker->last_name }} </P>
                <p>Salary: {{ $allsalarythismonth }}</p>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>day</th>
                    <th>Presence</th>
                    <th>parttime</th>
                </tr>
                </thead>
                <tbody>
                @foreach($absencesss as $absence)
                <tr>
                    <td>{{ $absence->date}}</td>
                    <td>{{ $absence->presence }}</td>
                    <td>
                        @foreach($parttimes as $parttime)
                                @if($parttime->date == $absence->date)
                                    {{ $parttime->timespend }} hours
                                @else
                                    null
                                @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
                    {{--<td>--}}
                        {{--<ul>--}}
                            {{--days:{{$absences}} <br>--}}
                            {{--@foreach($absencess as $absences)--}}
                                {{--<li>{{ $absences->date }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</td>--}}

                    {{--<td>--}}
                        {{--<ul>--}}
                            {{--@foreach($presences as $presence)--}}
                                {{--<li>{{ $presence->date }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</td>--}}
                    {{--<td>{{ $salaryParttimeinThisMonth }}</td>--}}
                    {{--<td>{{ $allsalarythismonth }}</td>--}}
                    {{--<td>--}}
                        {{--<a href="{{ route('worker.edit', $worker->id) }}" class="btn btn-sm btn-primary">--}}
                            {{--Edit--}}
                        {{--</a>--}}

                        {{--{{ Form::open(['route' => ['worker.destroy', $worker->id], 'method' => 'DELETE']) }}--}}
                        {{--{{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}--}}
                        {{--{{ Form::close() }}--}}
                    {{--</td>--}}
                </tbody>
            </table>
        </div>
    </div>

@endsection