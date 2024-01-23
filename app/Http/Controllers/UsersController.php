<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DataTables;
class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm" id="editBtn">Edit</a><a href="javascript:void(0)" data-del="' . $row->id . '" class="delete btn btn-danger btn-sm" id="delBtn">Del</a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('welcome');
    }
    public function edit_user($id)
    {
        $user = User::find($id);

        if ($user) {
       
            return view('edit_user', ['user' => $user]);
        } 
    }
    public function edit_info(Request $request, $id)
    {

        echo '<pre>';
        print_r($request->toArray());
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found.');
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
       
        
        $user->save();
    
        return redirect()->route('users')->with('success', 'User updated successfully.');
    }
    public function delete_user($id){
   
        $user = User::find($id);
        if ($user) {
            $user->forceDelete();
            return redirect()->route('users')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('users')->with('success', 'User not found.');
        }
}
public function add_user()
{
   
   
        return view('add_user');
   
}
public function user_info(Request $request)
{


    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
       
        'password' => 'required|min:5',
   
       
    ], [
        'name.required' => 'Name field is required.',
        'email.required' => 'Email field is required.',
        'email.email' => 'Email field must be email address.',
       
        'password.required' => 'Password field is required.',
    
    ]);
    $user =new  User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('users')->with('success', 'User Added successfully.');
}
}
