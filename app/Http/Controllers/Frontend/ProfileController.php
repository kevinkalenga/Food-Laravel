<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfile(ProfileUpdateRequest $request)
    {
      //dd($request->all());
    }
}
