<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index($status)
    {
        $students = User::where([['role', 'Student'], ['status', $status]])->latest()->get();
        return view('admin.student.index', compact('students'));
    }

    public function delete(Request $request)
    {
        $student = User::find($request->input('dataid'));
        $student->delete();
        return back()->with('success', 'Student Deleted Succesfully');
    }

    public function status(Request $request)
    {
        $student = User::find($request->input('dataid'));
        $student->status = $request->status;
        $student->save();
        return back()->with('success', 'Status change to ' . $student->status);
    }
}
