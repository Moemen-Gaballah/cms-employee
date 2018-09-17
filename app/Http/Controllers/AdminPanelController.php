<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Sallary;
use App\Worker;
use DB;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function adminpanel() {
        $workers = Worker::all()->count();
        $lastworkers = Worker::orderBy('created_at','desc')->take(6)->get();
        $lastabsences = Absence::where('presence','absence')->orderBy('created_at','desc')->take(6)->get();
        $absences = Absence::all()->count();
        $salary = Sallary::all()->count();
        $totalsalary= DB::table("workers")->sum('sallary');

        return view('admin.content.adminpanel', compact(['workers', 'totalsalary', 'lastworkers', 'lastabsences']));
    }
}
