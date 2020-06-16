<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|unique:users|required',
            'name' => 'required|max:120',
            'password' => 'required|min:5'
        ]);
        $email = $request['email'];
        $firstname = $request['fname'];
        $password = bcrypt($request['password']);
        $user = new User();
        $user->email = $email;
        $user->name = $firstname;
        $user->password = $password;
        $user->save();
        echo $user;

        return view('index');
    }
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|unique:users|required',
            'password' => 'required|min:5'
        ]);
        return view('index');
    }

    public function uploadAvavtar(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            if (auth()->user()->avatar) {
                Storage::delete("/storage/app/public/images/" . auth()->user()->avatar);
            }
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
            // Print a success message!
            $request->session()->flash('message', 'Image was uploaded succesfully!!');
            return redirect()->back();
        } else {
            // Print an error message!
            return "Something Wrong happened!";
        }
    }
}
