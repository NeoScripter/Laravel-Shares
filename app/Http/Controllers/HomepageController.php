<?php

namespace App\Http\Controllers;

use App\Models\Share;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {

        return view('home', [
            'shares' => Share::orderBy('created_at', 'DESC')->paginate(7)
        ]);
    }
}
