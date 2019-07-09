<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Controllers\Controller;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'std_id' => 'required',
            'password' => 'required'
        ]);

        //Attempt to login
        $credentials = request(['std_id', 'password']);
        $student = Student::where('std_id', $request->input('std_id'))
            ->first();
        if (!$student)
            // If Attempt fails1
            return response()->json([
                'message' => 'Incorrect credentials !!'
            ], 401);
        else {
            $check = Hash::check($request->input('password'), $student->password);
            if ($check)
                \auth('students')->setUser($student);
            else
                return response()->json([
                    'message' => 'Incorrect credentials !!'
                ], 401);
        }

        $user = $request->user();
        // Token Key
        // Person Grant Type

        $tokenResult = $user->createToken('h31sRr6Sq10UR5lexNJEghrs1ewt2b8DvQKiVxqu');

        $token = $tokenResult->token;
        // When remember me is set to true
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return JsonResponse [string] message
     */

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @param Request $request
     * @return JsonResponse [json] user object
     */

    public function user(Request $request)
    {
        $user = $request->user();
        $student = Student::find($user['id']);
        $arr = collect([
            'id' => $student->std_id,
            'name' => $student->name,
            'department' => $student->department->name,
            'year' => $student->year_of_study
        ])->toArray();
        return response()->json($arr);
    }

    /**
     * @param $std_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notification($std_id)
    {
        $student = Student::where('std_id', $std_id)->first();
        if ($student) {
            $personal = $student->notifications()->orderBy('created_at', 'desc')->get();
            $general = $student->department->notifications()->orderBy('created_at', 'desc')->get();
            return view('app.students.notification', compact('personal', 'general'));
        }
    }

    /**
     * @param $std_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reports($std_id)
    {
        $student = Student::where('std_id', $std_id)->first();
        if ($student) {
            $attendances = $student->attendances()->orderBy('created_at', 'desc')->get();
            return view('app.students.report', compact('attendances', 'student'));
        }
    }

    /**
     * @param $std_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register($std_id)
    {
        if (!setting('site.registration_window'))
            return view('app.students.register_disabled');

        $student = Student::where('std_id', $std_id)->first();
        $courses = Course::where('year_of_study', (int) $student->year_of_study + 1)
            ->where('department_id', $student->department_id)
            ->orderBy('semester', 'asc')
            ->get();

        if ($student) {
            return view('app.students.register', compact('student', 'courses'));
        }
    }

    /**
     * @param $std_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function information($std_id)
    {
        $student = Student::where('std_id', $std_id)->first();
        if ($student) {
            return view('app.students.information', compact('student'));
        }
    }
}
