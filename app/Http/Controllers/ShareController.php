<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Rules\NoProfanity;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function show(Share $share) {
        return view('share.show', [
            'share' => $share
        ]);
    }

    public function store() {

        request()->validate([
            'share' => [
                'required',
                'min:5',
                'max:240',
                new NoProfanity(),
            ],
        ]);

        $share = new Share([
            'content' => request()->get('share', '')
        ]);
        $share->save();

        return redirect()->route('home')->with('success', 'Share successfully added!')->with('details', 'Thank you very much for sharing your thoughts with us today!');
    }

    public function destroy($id) {

        Share::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('home')->with('success', 'Share successfully deleted!');
    }
}
