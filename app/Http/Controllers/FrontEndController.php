<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function notice()
    {
        $notices = Notice::where('status', 'Show')->orderBy('date', 'desc')->get();
        return view('students.home', compact('notices'));
    }
}
