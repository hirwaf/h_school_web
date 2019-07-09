<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lecturer;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LecturersController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Attempt to login
        $credentials = request(['email', 'password']);
        $lecturer = Lecturer::where('email', $request->input('email'))
            ->first();
        if (!$lecturer)
            // If Attempt fails1
            return response()->json([
                'message' => 'Incorrect email !!'
            ], 401);
        else {
            $check = Hash::check($request->input('password'), $lecturer->password);
            if ($check)
                \auth('lecturers')->setUser($lecturer);
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCourses(Request $request, $id)
    {
        $lecture = Lecturer::find($id);
        if ($lecture) {
            $courses = $lecture->courses()->with('department')->get();
            $arr = [];
            foreach ($courses as $course) {
                $arr[] = [
                    'id' => $course->id,
                    'name' => ucwords($course->name),
                    'department' => ucwords($course->department->name),
                    'year' => $course->year_of_study,
                    'department_id' => $course->department_id
                ];
            }
            return response()->json($arr);
        } else {
            return response()->json([
                'message' => 'Ooops something went wrong'
            ]);
        }
    }

    public function getStudents(Request $request, $department, $year)
    {
        $students = Student::where('department_id', $department)->get();
        $std = [];
        foreach ($students as $student) {
            if ($student->year_of_study == $year) {
                $std[] = [
                    'id' => $student->std_id,
                    'name' => $student->name,
                    'department' => $student->department->name,
                    'year' => $student->year_of_study
                ];
            }
        }

        return response()->json($std);
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
        return response()->json($user);
    }
}
