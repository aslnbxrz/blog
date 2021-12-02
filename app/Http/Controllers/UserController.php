<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view("admin.user.index", compact("users"));
    }
    public function create()
    {
        return view("admin.user.create");
    }
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "description" => $request->description
        ]);

        Session::flash("success", "User created successfuly");
        return redirect()->back();
    }
    public function edit(User $user)
    {
        return view("admin.user.edit", compact("user"));
    }
    public function update(Request $request, User $user)
    {
        //validation
        $this->validate($request, [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email, $user->id",
            "password" => "sometimes|nullable|min:8",
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->save();

        Session::flash("success", "User updated successfuly");
        return redirect()->back();
    }
    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();

            Session::flash("success", "User deleted successfuly");
            return redirect()->route("user.index");
        }
    }
}
