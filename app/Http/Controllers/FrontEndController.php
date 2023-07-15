<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class FrontEndController extends Controller
{
    public function notice()
    {
        $notices = Notice::where('status', 'Show')->orderBy('date', 'desc')->get();
        return view('students.home', compact('notices'));
    }



    public function edit()
    {
        $student = Auth::user();
        return view('students.profile.edit', compact('student'));
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'photoapath' => 'nullable',
            'oldpath' => 'nullable',
        ]);

        $student = User::find(auth()->user()->id);

        $file = $data['oldpath'];
        if ($request->hasFile('profile_photo')) {
            //file name with extentsion
            $filenameWithExt_file = $request->file('profile_photo')->getClientOriginalName();
            //only file name
            $filename_file = pathinfo($filenameWithExt_file, PATHINFO_FILENAME);
            //only extension
            $extension_file = $request->file('profile_photo')->getClientOriginalExtension();
            //file name to store
            $file = $filename_file . '_' . time() . '.' . $extension_file;

            //Move file to desired location
            $path = $request->file('profile_photo')->move('img/profiles/', $file);
            File::delete(public_path("img/profiles/" . $data['oldpath']));
        }
        $data['profile_photo'] = $file;
        $student->update($data);

        return back()->with('success', 'Updated Successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::find(Auth::user()->id);
        if (Hash::check($request->current_password, $user->password)) {
            $password = Hash::make($request->new_password);
            $user->password = $password;
            $user->update();
            return back()->with('success', 'Password Updated');
        } else {
            return back()->with('error', 'Current Password Incorrect');
        }
    }
}
