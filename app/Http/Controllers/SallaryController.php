<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Parttime;
use App\Sallary;
use App\Worker;
use Session;
use DB;
use Illuminate\Http\Request;

class SallaryController extends Controller
{
    public function index(){
        $sallaries = Sallary::all();

        $count = 0;

        foreach ($sallaries as $salary){

            $user=Worker::where("id",$salary->worker_id)->get();
            $count+=$user[0]->sallary;
        }

        return view('admin.content.sallary.index', compact(['sallaries', 'count']));
    }

    public function show($month) {
        $salaryInmonth = Sallary::where('month', '=', $month)->get();

        $count = 0;

        foreach ($salaryInmonth as $mon){

            $user=Worker::where("id",$mon->worker_id)->get();
            $count+=$user[0]->sallary;
        }

        return view('admin.content.sallary.show', compact(['salaryInmonth', 'count']));
    }

    public function create(){
        $workers = Worker::all();
        return view('admin.content.sallary.create', compact('workers'));
    }

    public function store(Request $request) {
        $salariesunique = Sallary::where('worker_id', '=', $request->worker_id)->where('month', '=', $request->month)->count();

        if($salariesunique > 0){
            $this->validate($request, array(
                'worker_id' => 'required|unique:sallaries',
                'month' => 'required',
            ));
        }else {
            $this->validate($request, array(
                'worker_id' => 'required',
                'month' => 'required',
            ));
        }


        $salary = new Sallary();
        $salary->worker_id = $request->worker_id;
        $salary->month = $request->month;
        $salary->save();

        Session::flash('success', 'The Sallary was successfully Add');
        return redirect()->route('sallary.index');
    }

    public function salaryforuser($id){
        $worker = Worker::findOrFail($id);

        $absences = Absence::where('presence', '=', 'absence')->where('worker_id', '=', $id)->count();
        $absencess = Absence::where('worker_id', '=', $id)->where('presence', '=', 'absence')->get();
        $absencesss = Absence::where('worker_id', '=', $id)->get();
        $presences = Absence::where('worker_id', '=', $id)->where('presence', '=', 'presence')->get();
        $presencescount = Absence::where('worker_id', '=', $id)->where('presence', '=', 'presence')->count();

        $daysWork = 20;
        $hoursWork = 20*8;
        $salaryfordays = $worker->sallary / $daysWork;
        $salaryformonth = $salaryfordays * $presencescount;

        $parttimes = Parttime::where('worker_id', '=', $id)->get();

        $timespendInMonth= DB::table("parttimes")->where('worker_id', '=', $id)->where('date','<=', date("Y-m-d", strtotime('30 days')) )->sum('timespend');
        $salaryParttimeinThisMonth =  $timespendInMonth / $hoursWork * $worker->sallary;

        $allsalarythismonth =  $salaryParttimeinThisMonth + $salaryformonth;

        return view('admin.content.sallary.salaryforuser', compact(['worker', 'parttimes', 'absences', 'salaryParttimeinThisMonth', 'allsalarythismonth', 'absencess','presences', 'absencesss']));

    }


    public function destroy($id)
    {
        $sallary = Sallary::find($id);
        $sallary->delete();

        Session::flash('success', 'The Sallary was successfully deleted');
        return redirect()->route('sallary.index');
    }

}
