<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
use File;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request)
    { 
        $user = Auth::user();

        if(Hash::check($request->password, $user->password))
        {
            if($request->hasFile('image'))
            {
                $oldPic = public_path("/images/{$user->image}");
                if(File::exists($oldPic)) {
                    unlink($oldPic);
                }
                $profileUpload = request()->file('image');
                $profilePicName = time() . '.' . $profileUpload->getClientOriginalExtension();
                $avatarPath = public_path('/images/');
                $profileUpload->move($avatarPath, $profilePicName);
                $user->image = '/images/' . $profilePicName;
                $user->save();
            }
            if(Auth::user()->email == request('email')) {
            
                $this->validate(request(), [
                        'name' => ['required', 'string', 'max:50'],
                        'dob' => ['required', 'date'],
                        'phone' => ['required', 'numeric', 'digits:10' ],
                        'address' => ['required', 'string', 'max:100'],
                        'hindi_name' => ['required', 'string', 'max:200'],
                    ]);
                    
                $user->name = $request->name;
                $user->dob = $request->dob;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->hindi_name = $request->hindi_name;
                
            }
            else{
                
                $this->validate(request(), [
                    'name' => ['required', 'max:50'],
                    'email' => 'email|required|unique:users,email',
                    'dob' => ['required', 'date'],
                    'phone' => ['required', 'numeric', 'digits:10' ],
                    'address' => ['required', 'string', 'max:100'],
                    'hindi_name' => ['required', 'string', 'max:200'],
                ]);
            
                $user->name = $request->name;
                $user->email = $request->email;
                $user->dob = $request->dob;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->hindi_name = $request->hindi_name;
                
            } 
            // $this->validate(request(), [
            //     'name' => 'required|string|max:50',
            //     'email' => 'required|email|unique:users',
            //     'dob' => 'required|date',
            //     'phone' => 'required|numeric|digits:10',
            //     'address' => 'required|string|max:100',
            //     'hindi_name' => 'required|string|max:300',
            // ]);

            // check if new image is uploaded
            // if($request->hasFile('image'))
            // {
            //     $profileUpload = request()->file('image');
            //     $profilePicName = time() . '.' . $profileUpload->getClientOriginalExtension();
            //     $avatarPath = public_path('/images/');
            //     $profileUpload->move($avatarPath, $profilePicName);
            //     $user->image = '/images/' . $profilePicName;
            //     $user->save();
            // }

            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->dob = $request->dob;
            // $user->phone = $request->phone;
            // $user->address = $request->address;
            // $user->hindi_name = $request->hindi_name;

            $user->save();
            Session::flash('success', 'Profile updated successfully .... ');
            return redirect()->route('home');
        }
        Session::flash('error', 'Oops ...  Incorrect Password.');
        return back();
    }

}
