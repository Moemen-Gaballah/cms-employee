@extends('admin.main')
@section('title', 'AdminPanel')
@section('content')

    <style>
        /* Start Dashboard Page */

        .home-stats .stat {
            padding: 20px;
            font-size: 15px;
            color: #FFF;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        .home-stats .stat i {
            position: absolute;
            font-size: 80px;
            top: 35px;
            left: 30px;
        }

        .home-stats .stat .info {
            float: right;
        }

        .home-stats .stat a {
            color: #FFF;
        }

        .home-stats .stat a:hover {
            text-decoration: none;
        }

        .home-stats .stat span {
            display: block;
            font-size: 60px;
        }

        .home-stats .st-members {
            background-color: #3498db;
        }

        .home-stats .st-pending {
            background-color: #c0392b;
        }

        .home-stats .st-items {
            background-color: #d35400;
        }

        .home-stats .st-comments {
            background-color: #8e44ad;
        }

        .latest {
            margin-top: 30px;
        }

        .latest .toggle-info {
            color: #999;
            cursor: pointer
        }

        .latest .toggle-info:hover {
            color: #444;
        }

        .latest-users {
            margin-bottom: 0;
        }

        .latest-users li {
            padding: 10px;
            overflow: hidden;
        }

        .latest-users li:nth-child(odd) {
            background-color: #EEE;
        }

        .latest-users .btn-success,
        .latest-users .btn-info {
            padding: 2px 8px;
        }

        .latest-users .btn-info {
            margin-right: 5px;
        }

        .latest .comment-box {
            margin: 5px 0 10px;
        }

        .latest .comment-box .member-n,
        .latest .comment-box .member-c {
            float: left;
        }

        .latest .comment-box .member-n {
            width: 80px;
            text-align: center;
            margin-right: 20px;
            position: relative;
            top: 10px;
        }

        .latest .comment-box .member-c {
            width: calc(100% - 100px);
            background-color: #EFEFEF;
            padding: 10px;
            position: relative;
        }

        .latest .comment-box .member-c:before {
            content: "";
            display: block;
            position: absolute;
            left: -28px;
            top: 5px;
            width: 0;
            height: 0;
            border-style: solid;
            border-color: transparent #EFEFEF transparent transparent;
            border-width: 15px;
        }

        /* End Dashboard Page */
    </style>
    <!-- start adminpanel -->

    <div class="home-stats">
    <div class="container text-center">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3 col-md-offset-3">
                <div class="stat st-members">
                    <i class="fa fa-users"></i>
                    <div class="info">
                        Total Worker
                        <span>
									<a href="worker">{{ $workers }}</a>
								</span>
                    </div>
                </div>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-3 col-md-offset-3">
                <div class="stat st-pending">
                    {{--<i class="fa fa-user-plus"></i>--}}
                    <div class="info">
                        Total Salary in month
                        <span>
                            <a href="sallary">
                                 {{ $totalsalary }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-1">

            </div>

            <div class="col-md-3 col-md-offset-3">
                <div class="stat st-pending">
                    {{--<i class="fa fa-user-plus"></i>--}}
                    <div class="info">
                        Total Salary in year
                        <span>
                            <a href="sallary">
                                 {{ $totalsalary*12 }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>




        </div>
    </div>
    </div>

    <div class="latest">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2> Latest 6 Worker Add </h2>
                        </div>
                        <div class="panel-body" style="background-color: #dddddd">
                            <ul class="list-unstyled latest-users">
                                @foreach($lastworkers as $lastworker)
                                    {{--{{ $lastworkers }}--}}
                                 <li><a href="worker/{{$lastworker->id}}">{{ $lastworker->first_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2> Latest 6 Worker absence </h2>
                        </div>
                        <div class="panel-body" style="background-color: #dddddd">
                            <ul class="list-unstyled latest-users">
                                @foreach($lastabsences as $lastabsence)
                                    {{--{{ $lastworkers }}--}}
                                    <li><a href="absence">{{ $lastabsence->worker->first_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Latest Comments -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Latest Comments -->
        </div>
    </div>


    <!-- End adminpanel -->


@endsection