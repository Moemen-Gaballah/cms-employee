@extends('admin.main')
@section('title', 'Show Worker')
@section('content')
    <a href="{{ route('downloadfile', $worker) }}">Download PDF laravel pugins</a>

    <button id="cmd">Generate PDF use js</button>

            {{--<!-- Start table Show  -->--}}

            <div class="container">
                <div class="row" id="example23">
                    <a href="{{ url('/worker/create') }}" style="float:right;" class="btn btn-primary pull-right">Add New Worker</a>
                    <table class="table table-striped" id="content">
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
                            <th>Control </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $worker->id}}</td>
                                <td>{{ $worker->first_name }}</td>
                                <td>{{ $worker->last_name }}</td>
                                <td>{{ $worker->name_job }}</td>
                                <td>{{ $worker->sallary }}</td>
                                <td>{{$worker->age }}</td>
                                <td>{{$worker->gender }}</td>

                                <td>{{ $worker->address }}</td>
                                <td>{{ $worker->created_at }}</td>
                                <td>

                                    {{ Form::open(['route' => ['worker.destroy', $worker->id], 'method' => 'DELETE']) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>



@endsection

<script src="{{asset('js/jspdf.js')}}">

</script>
@section('script')


    <script src="{{asset('js/pdfFromHTML.min.js')}}">

    </script>
    <script>
        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };

        $('#cmd').click(function () {
            doc.fromHTML($('#content').html(), 15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });
            doc.save('sample-file.pdf');
        });

        // This code is collected but useful, click below to jsfiddle link.
    </script>

@endsection