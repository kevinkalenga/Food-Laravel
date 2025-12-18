<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function updateProfile(ProfileUpdateRequest $request)
    {
      //dd($request->all());
      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();

      return redirect()->back()->with('status', 'User Updated Successfully!');
    }
}
