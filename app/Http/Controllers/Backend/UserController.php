<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['store']]);
        $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view("backend.user.user.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.user.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'email' => 'required|unique:users|max:50',
                'usertype' => 'required',
                'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            ],
            [
                'image.max' => 'The image size must be under 2MB.',
            ]
        );

        $user = new User();
        $user_exist = $user->where('email', $request->email)->first();
        if ($user_exist) {
            return redirect()->back()->with('error', 'Email already exist!');
        }

        $roles = request('roles');

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->usertype   = $request->usertype;
        $user->phone      = $request->phone;
        $user->password   = Hash::make($request->password);
        $user->country    = $request->country;
        $user->address    = $request->address;
        $user->city       = $request->city;
        $user->postal_code = $request->postal_code;
        $user->status     = $request->status ? $request->status : 'active';
        $user->facebook   = $request->facebook;
        $user->twitter    = $request->twitter;
        $user->linkedin   = $request->linkedin;
        $user->youtube    = $request->youtube;
        $user->vimeo      = $request->vimeo;
        $user->instagram  = $request->instagram;
        $user->website    = $request->website;
        $user->bio        = sanitizeInput($request->bio);
        $user->designation = $request->designation;
        $user->experience = $request->experience;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = "/uploads/users/" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/users');
            $image->move($destinationPath, $image_name);
            $user->image = $image_name;
        } else {
            $user->image = '/uploads/users/default.png';
        }

        if ($request->usertype == 'admin') {
            if ($roles) {
                $user->assignRole($roles);
            }
        } elseif ($request->usertype == 'instructor') {
            $user->assignRole('instructor');
        }
        $user->save();
        session()->flash('success', 'User created successfully!');
        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view("backend.user.user.edit", compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //user update with image unlink old image
        $user = User::findOrFail($id);
        $request->validate(
            [
                'first_name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'email' => 'required|max:50|unique:users,email,' . $user->id,
                'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            ],
            [
                'image.max' => 'The image size must be under 2MB.',
            ]
        );

        $roles = request('roles');

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->usertype   = $request->usertype ?? 'user';
        if ($request->usertype == 'admin') {
            // Get the new roles from the request
            $newRoles = $request->input('roles', []); // Assuming roles are passed in the request
            // Get the user's current roles
            $currentRoles = $user->roles()->pluck('name')->toArray();
            // Remove old roles
            $rolesToRemove = array_diff($currentRoles, $newRoles);
            if (!empty($rolesToRemove)) {
                foreach ($rolesToRemove as $roleToRemove) {
                    $user->removeRole($roleToRemove);
                }
            }
            // Sync new roles
            if (!empty($newRoles)) {
                $user->syncRoles($newRoles);
            }
        }
        if ($request->usertype == 'instructor') {
            $user->assignRole('instructor');
        }
        if ($request->usertype == 'user') {
            $user->syncRoles([]);
        }

        $user->phone      = $request->phone;
        $user->country    = $request->country;
        $user->address    = $request->address;
        $user->city       = $request->city;
        $user->postal_code = $request->postal_code;
        $user->status     = $request->status ? $request->status : 'active';
        $user->facebook   = $request->facebook;
        $user->twitter    = $request->twitter;
        $user->linkedin   = $request->linkedin;
        $user->youtube    = $request->youtube;
        $user->vimeo      = $request->vimeo;
        $user->instagram  = $request->instagram;
        $user->website    = $request->website;
        $user->bio        = sanitizeInput($request->bio);
        $user->designation = $request->designation;
        $user->experience = $request->experience;
        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path($user->image)) && !empty($user->image)) {
                unlink(public_path($user->image));
            }
            $image = $request->file('image');
            $image_name = "/uploads/users/" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/users');
            $image->move($destinationPath, $image_name);
            $user->image = $image_name;
        }

        $user->save();
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete user with image
        $user = User::findOrFail($id);
        if (file_exists(public_path($user->image)) && !empty($user->image)) {
            unlink(public_path($user->image));
        }
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }

    /**
     * Update the password
     */
    public function updatepass(Request $request)
    {
        return view('frontend.student.student-password-update');
    }

    /**
     * Update the password
     */
    public function updatepasspost(Request $request, string $id)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'password' => 'required|confirmed|min:8',
            ],
            [
                'password.confirmed' => 'password does not match.',
            ]
        );

        $user = User::findOrFail($id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            session()->flash('success', 'Password updated successfully!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Old password does not match!');
            return redirect()->back();
        }
    }
}