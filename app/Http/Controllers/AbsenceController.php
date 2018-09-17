<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Worker;
use Session;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absences = Absence::all();

        return view('admin.content.absence.index',compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workers = Worker::all();

        return view('admin.content.absence.create', compact('workers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $absenceUnique = Absence::where('worker_id', '=', $request->worker_id)->where('date', '=', date("Y-m-d" ,time()))->count();

        if($absenceUnique > 0){
            $this->validate($request, array(
                'worker_id' => 'required|unique:absences',
                'presence' => 'required',
            ));
        }else{
            $this->validate($request, array(
                'worker_id' => 'required|',
                'presence' => 'required',
            ));
        }


        $presence = new Absence();
        $presence->worker_id = $request->worker_id;
        $presence->presence = $request->presence;
        $presence->notes = $request->notes;
        $presence->date = date("Y-m-d" ,time());
        $presence->save();

        Session::flash('success', 'The Presence was successfully Add');
        return redirect()->route('absence.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absences = Absence::find($id);
        $absences->delete();

        Session::flash('success', 'The Absence was successfully deleted');
        return redirect()->route('absence.index');
    }

    public function AllWorkerPresence(){
        $workers = Worker::all();
        foreach ($workers as $worker) {

            $absenceUnique = Absence::where('worker_id', '=', $worker->worker_id)->where('date', '=', date("Y-m-d", time()))->count();

            if (!$absenceUnique > 0) {

                $presence = new Absence();
                $presence->worker_id = $worker->id;
                $presence->presence = 'presence';
                $presence->notes = 'Null';
                $presence->date = date("Y-m-d", time());
                $presence->save();

            }


        }
        Session::flash('success', 'The Presence was successfully Add');
        return redirect()->route('absence.index');

    }
}
