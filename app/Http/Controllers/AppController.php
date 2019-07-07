<?php

namespace App\Http\Controllers;

use App\College;
use App\Department;
use App\Http\Requests\RegisterFormRequest;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('pageview');
    }


    public function application()
    {
        if (!setting('site.application_window'))
            return view('app.application_disabled');

        $colleges = College::all();
        if ($colleges)
            $colleges = $colleges->pluck('name', 'id')->toArray();
        else
            $colleges = [];

        return view('app.application', compact('colleges'));
    }

    public function getDepartment(Request $request)
    {
        $dept = Department::where('college_id', $request->get('_college'))->get();
        if ($dept->count() > 0)
            return $dept->pluck('name', 'id')->toJson();
        else
            return json_encode([]);
    }

    public function submitApplication(RegisterFormRequest $request)
    {
        $studentID = getNewStudentId();
        $request->request->add(['std_id' => $studentID]);
        $data = $request->except(['_key', '_token']);

        Student::create($data);

        return view('app.application_submitted', compact('data'));
    }
}
