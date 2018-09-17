<?php

namespace App\Http\Controllers;

use App\Parttime;
use App\Worker;
use Session;
use Illuminate\Http\Request;

class ParttimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parttimes = Parttime::all();

        return view('admin.content.parttime.index', compact('parttimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workers = Worker::all();

        return view('admin.content.parttime.create', compact('workers'));
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
        $parttimeUnique = Parttime::where('worker_id', '=', $request->worker_id)->where('date', '=', date("Y-m-d" ,time()))->count();

        // Save a New data
        if($parttimeUnique > 0) {
            $this->validate($request, array(
                'worker_id' => 'required|unique:parttimes',
                'timespend' => 'required|int',
            ));
        }else {
            $this->validate($request, array(
                'worker_id' => 'required',
                'timespend' => 'required|int',
            ));
        }
            $parttime = new Parttime();
            $parttime->worker_id = $request->worker_id;
            $parttime->timespend = $request->timespend;
            $parttime->date = date("Y-m-d", time());

            $parttime->save();

        // Set Flash data with success message
        Session::flash('success', 'New parttime has been created.');
        return redirect('/parttime');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parttime  $parttime
     * @return \Illuminate\Http\Response
     */
    public function show(Parttime $parttime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parttime  $parttime
     * @return \Illuminate\Http\Response
     */
    public function edit(Parttime $parttime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parttime  $parttime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parttime $parttime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parttime  $parttime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parttime = Parttime::find($id);
        $parttime->delete();

        Session::flash('success', 'The Parttime was successfully deleted');
        return redirect('/parttime');
    }

}
