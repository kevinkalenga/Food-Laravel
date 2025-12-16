<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
   public function index()
   {
     return view('admin.profile.index');
   }
   public function updateProfile(ProfileUpdateRequest $request)
   {
      // user instance
     $user = Auth::user();

     $user->name = $request->name;
     $user->email = $request->email;
     $user->save();
     
     
     return redirect()->back()->with('status', 'Admin Updated Successfully!');
   }
}
