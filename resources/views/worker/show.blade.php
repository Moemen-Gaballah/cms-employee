@extends('main')
@section('title', 'category')
@section('content')
    <div class="container">
        <div class="row">
            <h2 style="margin-toh2: 6h2x; widh2: 50%; float:left;">Show Worker</h2>
            <a href="{{ route('downloadfile', $worker) }}">Download PDF</a>
            {{--<a href="">Download PDF</a>--}}

                    <h2>#</h2>
                    <h2>first Name : {{$worker->first_name }}</h2>
            <br>
                    <h2>Last Name : {{$worker->last_name }}</h2>
            <br>
                    <h2>Name Job {{$worker->name_job }}</h2>
            <br>
                    <h2>Sallary {{$worker->sallary}}</h2>
            <br>
                    <h2>age{{$worker->age }}</h2>
            <br>
                    <h2>gender {{$worker->gender }}</h2>
            <br>
                    <h2>address{{$worker->address }}</h2>
            <br>
                    <h2>absence {{$absences}}</h2>
            <br>
                    <h2>salary For this month: {{$salaryForthisUser}}</h2>
            <br>
                    <h2>created at{{$worker->created_at }}</h2>
            <br>
                    <h2>sallay_in_year {{ $sallayInYear }}</h2>
                </tr>

        </div>
    </div>
@endsection