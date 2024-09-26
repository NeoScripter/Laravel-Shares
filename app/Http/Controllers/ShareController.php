<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Models\User;
use App\Rules\NoProfanity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShareController extends Controller
{

    public function edit(Share $share) {

        if (auth()->id() !== $share->user_id) {
            abort(403);
        }

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
            ]
        ]);

        $validated['content'] = $validated['share'];
        $validated['user_id'] = auth()->id();

        Share::create($validated);

        return redirect()->route('home')->with('success', 'Share successfully added!')->with('details', 'Thank you very much for sharing your thoughts with us today!');
    }

    public function update(Share $share) {

        if (auth()->id() !== $share->user_id) {
            abort(403);
        }

        request()->validate([
            'edit_share' => [
                'required',
                'min:5',
                'max:240',
                new NoProfanity(),
            ],
            'image' => [
                'image',
                'max:2048'
            ]
        ]);

        $share->content = request()->get('edit_share', '');
        $share->save();

        if (request()->hasFile('image')) {
            // Store the new image and get its path
            $imagePath = request()->file('image')->store('profile', 'public');

            // Delete the old image (if it exists)
            if ($share->user->image) {
                Storage::disk('public')->delete($share->user->image);
            }

            // Update the user's image with the new path
            $share->user->image = $imagePath;
            $share->user->save();
        }

        return redirect()->route('home')->with('success', 'Share successfully updated!')->with('details', 'Thank you for updating your share!');
    }

    public function destroy(Share $share) {

        if (auth()->id() !== $share->user_id) {
            abort(403);
        }

        $share->delete();

        return redirect()->route('home')->with('success', 'Share successfully deleted!');
    }
}
