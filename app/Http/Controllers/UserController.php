<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Auth;

class UserController extends Controller
{
  // users.index
  public function index()
  {
    // sections 
    $sections = getSections();

    // users 
    $users = User::where('role_id', '!=', 1)->get();
    // $users = User::get();

    return view('pages.users.index', compact('sections', 'users'));
  }

  // users.create
  public function create(Request $request)
  {
    // sections 
    $sections = getSections();

    // roles 
    $roles = Role::where('slug', '!=', 'admin')->get();

    // permissions
    $permissions = Permission::get();

    // workers 
    $workers = Worker::where('slug', '>', 0)->get();

    return view('pages.users.form', compact('sections', 'roles', 'workers', 'permissions'));
  }

  // users.store
  public function store(UserRequest $request)
  {
    $user = User::create([
      'worker_id' => $request['worker_id'],
      'name' => $request['name'],
      'role_id' => $request['role_id'],
      'password' => bcrypt($request['password'])
    ]);

    // permissions 
    if ($request->input('permissions')) :
      $user->permissions()->attach($request->input('permissions'));
    endif;

    return redirect()->route('users.index');
  }

  // users.edit
  public function edit(User $user)
  {
    // sections 
    $sections = getSections();

    // roles 
    $roles = Role::where('slug', '!=', 'admin')->get();

    // permissions
    $permissions = Permission::get();

    // workers 
    $workers = Worker::where('slug', '>', 0)->get();

    return view(
      'pages.users.form',
      compact('sections', 'roles', 'workers', 'user', 'permissions')
    );
  }

  // users.update
  public function update(UserRequest $request, User $user)
  {
    $user->worker_id = $request['worker_id'];
    $user->name = $request['name'];
    $user->role_id = $request['role_id'];
    $request['password'] == null ?: $user->password = bcrypt($request['password']);

    $user->permissions()->detach();
    if ($request->input('permissions')) :
      $user->permissions()->attach($request->input('permissions'));
    endif;

    $user->save();

    return redirect()->route('users.index');
  }

  // users.destroy
  public function destroy(User $user)
  {
    $user->permissions()->detach();
    $user->delete();
    return redirect()->route('users.index');
  }
}
