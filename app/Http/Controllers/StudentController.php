<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    

    public function index(Request $request)
    {

        $students = Students::all();
        if ($students->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $students->all()
            ]);
        } else {
            return response()->json([
                'status' => 422,
                'message' => 'No student records found'
            ]);
        }
    }

    public function insert(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:11'
        ]);


        $student = new Students;

        $student->name = $validator['name'];
        $student->course =  $validator['course'];
        $student->email =  $validator['email'];
        $student->phone =  $validator['phone'];

        $student->save();

        return response()->json(['data' => $request->all()], 200);
    }

    public function show($id)
    {
        $student = Students::find($id);

        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Student not found'
            ]);
        }
    }

    public function edit($id)
    {
        $student = Students::find($id);

        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Student not found'
            ]);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:11'
        ]);

        // return response()->json($validator->errors()); -- to quickly check if there are errors before proceeding

        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => 'Student not found'
            ]);
        } else {
            $student = Students::find($id);

            $student->update([
                'name' => $request->name,
                'course' =>  $request->course,
                'email' =>  $request->email,
                'phone' =>  $request->phone
            ]);

            $student->save();
            return response()->json([
                'status' => 200,
                'student' => $student
            ]);
        }
    }

    public function destroy($id)
    {
        $student = Students::find($id);
        if($student){
            $student->delete();

            return response()->json([
                'status'=>200,
                'student'=>"Successfully removed this student's data"
            ]);
        }else{
            return response()->json([
                'status'=>422,
                'student'=>'No such student found'
            ]);
        }
    }
}
