<?php

namespace App\Http\Controllers;

use App\Mail\LoginCredentials;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(Request $request){
        // dd($request->all());
        $search_role = null;
        if(!is_null($request->filter_role)){
            $search_role = $request->filter_role;
        }
        $users = User::whereNot('id',auth()->user()->id)->where('status', '!=', 'requested')->with('roles');
        
        if(!is_null($search_role)){
            $users = $users->where('role_id',$search_role);
        }
        $users = $users->orderBy('id','desc')->get();
        $roles = Role::all();
        return view('users.index',compact('users','roles','search_role'));
    }

    public function create(){
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request){
        try{
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
    
            return redirect()->route('users.index')->with('success','Added Successfully!');
        } catch(Exception $ex){
            return redirect()->route('users.index')->with('error',$ex->getMessage());
        }
    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        $status = config('constants.USER_STATUS');
        return view('users.edit', compact('roles','user','status'));
    }

    public function update(Request $request, $id){
        try{
            $input = $request->all();
            $user = User::find($id);
            $user->role_id = $input['role_id'];
            $user->status = $input['status'];
            $user->save();
    
            return redirect()->route('users.index')->with('success','Updated Successfully!');
        } catch(Exception $ex){
            return redirect()->route('users.index')->with('error',$ex->getMessage());
        }
    }

    public function delete($id){
        try{
            $user = User::find($id)->delete();
            return redirect()->route('users.index')->with('success','Deleted Successfully!');
        } catch(Exception $ex){
            return redirect()->route('users.index')->with('error',$ex->getMessage());
        }
    }

    public function requestedUsers(){
        $status = config('constants.USER_STATUS');
        $users = User::where('status',$status[0])->where('role_id',config('constants.USER_ROLE'))->get();

        return view('admin.users.requested', compact('users'));
    }
    
    public function editUserPermission($id){
        $user = User::find($id);
        $status = config('constants.USER_STATUS');
        return view('admin.users.permission', compact('user', 'status'));
    }

    public function updateUserPermission(Request $request, $id){
        $user = User::find($id);
        $user->status = $request->get('status');
        if($request->get('status') == 'approved'){
            $password = $this->generateRandomPassword(12);

            $user->password = bcrypt($password);

            Mail::to($user['email'])->send(new LoginCredentials([
                'first_name' => $user['first_name'],
                'email' => $user['email'],
                'password' => $password,
            ]));
        }
        $user->save();
        
        return redirect()->route('requested.user')->with('success','User upadted successfully.');
    }

    function generateRandomPassword($length = 10) {
        // Characters that can be used in the password
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
    
        $randomBytes = random_bytes($length);
    
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[ord($randomBytes[$i]) % strlen($characters)];
        }
    
        return $password;
    }
}
