<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::orderBy('date', 'desc')->get();
        return view('admin.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'file' => 'required',
            'status' => 'required',
        ]);

        //file name with extentsion
        $filenameWithExt_image = $request->file('file')->getClientOriginalName();
        //only file name
        $filename_image = pathinfo($filenameWithExt_image, PATHINFO_FILENAME);
        //only extension
        $extension_image = $request->file('file')->getClientOriginalExtension();
        //file name to store
        $image = $filename_image . '_' . time() . '.' . $extension_image;

        //Move file to desired location
        $path = $request->file('file')->move('img/files/', $image);
        $data['file'] = $image;

        Notice::create($data);
        return redirect(route('notice.index'))->with('success', 'Notice Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $notice = Notice::find($id);
        return view('admin.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'file' => 'nullable',
            'status' => 'required',
        ]);
        $notice = Notice::find($id);
        if ($request->hasFile('file')) {
            //file name with extentsion
            $filenameWithExt_image = $request->file('file')->getClientOriginalName();
            //only file name
            $filename_image = pathinfo($filenameWithExt_image, PATHINFO_FILENAME);
            //only extension
            $extension_image = $request->file('file')->getClientOriginalExtension();
            //file name to store
            $image = $filename_image . '_' . time() . '.' . $extension_image;
            //Move file to desired location
            $path = $request->file('file')->move('img/files/', $image);
            File::delete(public_path("img/files/" . $notice->file));
            $data['file'] = $image;
        }
        $notice->update($data);
        return redirect(route('notice.index'))->with('success', 'Notice Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        //
    }

    public function delete(Request $request)
    {
        $notice = Notice::find($request->input('dataid'));
        File::delete(public_path('img/files/' . $notice->file));
        $notice->delete();
        return back()->with('success', 'Notice Deleted Successfully');
    }
}
