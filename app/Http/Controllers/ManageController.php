<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ManageController extends Controller
{
    public function profilePage($fullName){

        $user = Auth::user();
        return view('includes.profile',['user' => $user]);
    }

    public function settingsPage(){

        $user = Auth::user();
        return view('includes.settings',['user' => $user]);
    }

    public function updateProfile($fullName, Request $request){

        $user = Auth::user();

        $user->update([
            'full_name' => strip_tags(\request('full_name')),
            'email' => strip_tags(\request('email')),
            'birthday' => strip_tags(\request('birthday'))
        ]);


        return redirect()->route('profile',$fullName)->with('success','The profile has been updated!');
    }

    public function updatePassword($fullName,Request $request){

        $user = Auth::user();

        $userPassword = $user->password;


        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['error'=>'password not match']);
        }

        $user->password = Hash::make($request->new_password);

        $user->save();

        return redirect()->route('profile',$fullName)->with("success","Password successfully changed!");

    }

    public function uploadImage($fullName,Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

//        $name = time().'-'.$request->file('image')->getClientOriginalName();
//        $path = $request->image->move(public_path('images'),$name);
//
//        $save = new Image();
//        $save->name = $name;
//        $save->path = $path;
//        $save->user_id = Auth::id();
//        $save->save();

        if($request->hasFile('avatar')){
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('images/profile_image'),$filename);
            Auth()->user()->update(['avatar'=>$filename]);
        }

        return redirect()->route('profile',$fullName)->with('success', 'Image Has been uploaded!');

    }
}
