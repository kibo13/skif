<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Role;
// use App\Models\Permission;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        // users 
        $users = User::where('role_id', '!=', 1)->get();
        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // roles 
        $roles = Role::where('slug', '!=', 'admin')->get();

        // workers 
        $workers = Worker::where('slug', '>', 0)->get();

        return view('pages.users.form', compact('roles', 'workers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'worker_id' => $request['worker_id'],
            'name' => $request['name'],
            'role_id' => $request['role_id'],
            'password' => bcrypt($request['password'])
        ]);

        // permissions 
        // if ($request->input('permissions')) :
        //     $user->permissions()->attach($request->input('permissions'));
        // endif;
        
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // roles 
        $roles = Role::where('slug', '!=', 'admin')->get();

        // workers 
        $workers = Worker::where('slug', '>', 0)->get();

        return view(
            'pages.users.form', 
            compact('roles', 'workers', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->worker_id = $request['worker_id'];
        $user->name = $request['name'];
        $user->role_id = $request['role_id'];
        $request['password'] == null ?:
            $user->password = bcrypt($request['password']);

        // $user->permissions()->detach();
        // if ($request->input('permissions')) :
        //     $user->permissions()->attach($request->input('permissions'));
        // endif;
  
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user->permissions()->detach();

        $user->delete();
        return redirect()->route('users.index');
    }
}
