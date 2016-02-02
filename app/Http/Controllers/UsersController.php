<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Initial page for admin
     */
    public function show_profile()
    {

        return view('user.profile');
    }

    /**
     * User settings
     */
    public function settings()
    {

    }

    public function upload_profile_photo(Request $request)
    {
        $this->validate($request, [
            'profile-pic' => 'required|mimes:png'
        ]);

        // create a name for the profile photo
        $imageName = $request->user()->id . '.' . $request->file('profile-pic')->getClientOriginalExtension();

        // save the name on the users table
        $user = $request->user();
        $user->profile_photo = $imageName;
        $user->save();

        // move the temp uploaded file to /public/img/user/profile-pics/
        $request->file('profile-pic')->move(base_path() . '/public/img/user/profile-pics/', $imageName);

        return redirect('/user/profile')->with(
            'flash_message', 'You have successfully added a photo!'
        );
    }
}
