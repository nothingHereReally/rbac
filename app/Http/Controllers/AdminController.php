<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function manageUsers(){
        $users = User::select('id','name','email')->get();

        return view('admin.manageUsers')->with(compact('users'));
    }
    public function updateUser(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('usertool')->with('success', 'User Updated successfully');
    }
    public function rmUser($id): RedirectResponse{
        $RMusr = User::findOrFail($id);
        $RMusr->delete();

        return redirect()->route('usertool')->with('success', 'User Deleted successfully');
    }


    public function manageUsrRoles($id){
        $usr = User::findOrFail($id);
        $usrroles = $usr->roles;
        $roles = Role::all();

        return view('admin.manageUserRoles')->with(compact('usr', 'usrroles', 'roles'));
    }
    public function addUsrRole(Request $request, $id){
        $request->validate([
            'role_id' => 'required|integer'
        ]);
        $user = User::findOrFail($id);
        if( $user->roles()->find($request->role_id) ){
            // nothing due already exist
        }else{
            $user->roles()->attach($request->role_id);
        }

        return redirect()->route('usr_roles.view', $id)->with('success', 'Role for user deleted successfully');
    }
    public function rmUsrRole($user_id, $role_id){
        $user = User::findOrFail($user_id);
        $user->roles()->detach($role_id);

        return redirect()->route('usr_roles.view', $user_id)->with('success', 'Role for user deleted successfully');
    }
}
