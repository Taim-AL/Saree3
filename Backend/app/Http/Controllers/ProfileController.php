<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Services\ImagServices;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id){
        $profile = Profile::where('user_id', $id)->first();

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        return response()->json($profile, 200);
    }

        public function update(Request $request, $id)
        {
            $profile = Profile::where('user_id', $id)->first();

            if (!$profile) {
                return response()->json(['message' => 'Profile not found'], 404);
            }

            $validated = $request->validate([
                'full_name' => 'nullable|string|max:255',
                'bio' => 'nullable|string',
                'avatar' => 'nullable|image|max:2048',
            ]);


            if ($request->hasFile('avatar')) {
                $profile->avatar = ImagServices::save('image',$request['avatar']);
            }

            if($request->has('full_name')){
                $profile->full_name = $request['full_name'];
            }

            if($request->has('bio')){
                $profile->bio = $request['bio'];
            }

            $profile->update($validated);

            return response()->json($profile, 200);


        }
}
