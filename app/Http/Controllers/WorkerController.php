<?php

namespace App\Http\Controllers;

use App\Parttime;
use Illuminate\Http\Request;
use App\Worker;
use App\Absence;
use Session;
use DB;
use PDF;

class WorkerController extends Controller
{
    public function index(){
        $workers = Worker::all();

        $allSallaryInMonth= DB::table("workers")->sum('sallary');
        $allSallaryInYear= $allSallaryInMonth*12;
        return view('admin.content.worker.index', compact(['workers','allSallaryInMonth', 'allSallaryInYear']));
    }

    public function create(){
        return view('admin.content.worker.create');
    }

    public function store(Request $request){
//        dd($request->all());
        // Save a New User And Then Redirect Back To USER
        $this->validate($request, array(
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'name_job' => 'required|string',
            'sallary' => 'required|string',
            'age' => 'required|int',
            'gender' => 'required|string',
            'address' => 'required|string',
        ));

        $Worker = new Worker();
        $Worker->first_name = $request->first_name;
        $Worker->last_name = $request->last_name;
        $Worker->name_job = $request->name_job;
        $Worker->sallary = $request->sallary;
        $Worker->age = $request->age;
        $Worker->gender = $request->gender;
        $Worker->address = $request->address;
        $Worker->save();

        // Set Flash data with success message
        Session::flash('success', 'New Category has been created.');
        return redirect('/worker');
    }

    public function show($id)
    {
        $worker = Worker::findOrFail($id);
        $sallayInYear = $worker->sallary * 12;

        $absences = Absence::where('presence', '=', 'absence')->where('worker_id', '=', $id)->count();
        $absencess = Absence::where('worker_id', '=', $id)->where('presence', '=', 'absence')->get();
        $presences = Absence::where('worker_id', '=', $id)->where('presence', '=', 'presence')->get();

        $daysWork = 20;
        $hoursWork = 20*8;
        $salaryformonth = $worker->sallary / $daysWork;
        $daysdoWork = $daysWork - $absences;
        $salaryForthisUser = $daysdoWork * $salaryformonth;

        $timespendInMonth= DB::table("parttimes")->where('worker_id', '=', $id)->where('date','<=', date("Y-m-d", strtotime('30 days')) )->sum('timespend');
        $salaryParttimeinThisMonth =  $timespendInMonth / $hoursWork * $worker->sallary;

        $allsalarythismonth =  $salaryParttimeinThisMonth + $salaryForthisUser;



        return view('admin.content.worker.show', compact(['worker', 'sallayInYear', 'absences', 'salaryForthisUser', 'salaryParttimeinThisMonth', 'allsalarythismonth', 'absencess', 'presences']));
    }

    public function destroy($id)
    {
        $worker = Worker::find($id);
        $worker->delete();

        Session::flash('success', 'The Worker was successfully deleted');
        return redirect()->route('worker.index');
    }

    public function fun_pdf($id){

        $worker = Worker::findOrFail($id);
        $sallayInYear = $worker->sallary * 12;

        $absences = Absence::where('presence', '=', 'absence')->where('worker_id', '=', $id)->count();

        $daysWork = 20;
        $salaryformonth = $worker->sallary / $daysWork;
        $daysdoWork = $daysWork - $absences;
        $salaryForthisUser = $daysdoWork * $salaryformonth;


        $pdf = PDF::loadView('worker.show', compact('worker', 'sallayInYear', 'absences', 'salaryForthisUser'));
        return $pdf->download('workershow.pdf');
    }

}
