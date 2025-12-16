<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function index()
   {
     return view('admin.profile.index');
   }
   public function updateProfile(ProfileUpdateRequest $request)
   {
     return redirect()->back();
   }
}
