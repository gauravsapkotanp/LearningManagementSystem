<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class TeacherController extends Controller
{
    public function create()
    {
        return view('admin.teacher.create');
    }

    public function index()
    {
        $teachers = User::where('role', 'Teacher')->latest()->get();
        return view('admin.teacher.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'role' => ['required', 'string'],
            'status' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        return redirect(route('teacher.index'))->with('success', 'Registered Successfully');
    }


    public function edit($id)
    {
        $teacher = User::find($id);
        return view("admin.teacher.edit", compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        $teacher = User::find($id);
        $teacher->update($data);
        return redirect(route('teacher.index'))->with('success', 'Teacher  Updated Successfully');
    }

    public function delete(Request $request)
    {
        $teacher = User::find($request->input('dataid'));
        $teacher->delete();
        return back()->with('success', 'Teacher Deleted Succesfully');
    }
}
