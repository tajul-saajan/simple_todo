<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {

        if($request->hasFile('image'))
        {
//            $filename =  $request->image->getClientOriginalName();
//            $this->deleteOldAvatar();
//            $request->image->storeAs('images', $filename ,'public');
//            auth()->user()->update(['avatar' => $filename]);
            auth()->user()->updateAvatarAttribute($request->image);
//            request()->session()->flash('message', 'Image Uploaded');
            return redirect()->back()->with('message', 'Image Uploaded');

        }
        request()->session()->flash('error', 'Image not Uploaded');
        return redirect()->back();
    }



    public function index()
    {
        return "I am in UserController";
    }
}
