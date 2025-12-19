<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Traits\FileUploadTrait;

class ProfileController extends Controller
{
    use FileUploadTrait;
    
    public function updateProfile(ProfileUpdateRequest $request)
    {
      //dd($request->all());
      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();

      return redirect()->back()->with('status', 'User Updated Successfully!');
    }
    public function updatePassword(ProfilePasswordUpdateRequest $request)
    {
         $user = Auth::user();
         $user->password = bcrypt($request->password); //new pwd
         $user->save();
      
         return redirect()->back()->with('status', 'Password Updated Successfully!');
    }
    public function updateAvatar(Request $request)
    {
        // Handle img file 
        $imagePath = $this->uploadImage($request, 'avatar');

        $user = Auth::user();
        $user->avatar = $imagePath;
        $user->save();

        return redirect()->back()->with('status', 'Avatar Updated Successfully!');
    }

    public function logout(Request $request)
  {
    Auth::guard('web')->logout();        // déconnecte le guard admin
    $request->session()->invalidate();      // invalide la session
    $request->session()->regenerateToken(); // nouveau token CSRF

    return redirect()->route('login'); // redirige vers login admin
  }
}
