<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Rules\NoProfanity;
use Illuminate\Http\Request;

class ShareController extends Controller
{

    public function edit(Share $share) {
        return view('share.edit', [
            'share' => $share
        ]);
    }

    public function store() {

        $validated = request()->validate([
            'share' => [
                'required',
                'min:5',
                'max:240',
                new NoProfanity(),
            ],
        ]);

        $validated['content'] = $validated['share'];
        $validated['user_id'] = auth()->id();

        Share::create($validated);

        return redirect()->route('home')->with('success', 'Share successfully added!')->with('details', 'Thank you very much for sharing your thoughts with us today!');
    }

    public function update(Share $share) {

        request()->validate([
            'edit_share' => [
                'required',
                'min:5',
                'max:240',
                new NoProfanity(),
            ],
        ]);

        $share->content = request()->get('edit_share', '');
        $share->save();

        return redirect()->route('home')->with('success', 'Share successfully updated!')->with('details', 'Thank you for updating your share!');
    }

    public function destroy($id) {

        Share::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('home')->with('success', 'Share successfully deleted!');
    }
}
