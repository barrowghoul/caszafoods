<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\DataTables\UserDataTable;
use App\Http\Requests\DashboardProfileUpdateRequest;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\ProfilePasswordUpdateRequest;
use App\Mail\NewUserMailable;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class DashboardProfileController extends Controller
{
    use FileUploadTrait;

    function index() : View {
        return view('profile.index');
    }

    function updateProfile(DashboardProfileUpdateRequest $request) : RedirectResponse {
        $user = Auth::user();

        $imagePath = $this->uploadImage($request,'avatar',$user->avatar,'/images/avatars');

        $user->name = $request->name;
        $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Su perfil se ha actualizado exitosametne', 'Exito');

        return redirect()->back();
    }

    function updatePassword(ProfilePasswordUpdateRequest $request) : RedirectResponse {

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Su contraseña se ha actualizado exitosametne', 'Exito');

        return redirect()->back();
    }

    function settings(RoleDataTable $dataTable){
        return $dataTable->render('profile.settings');
    }

    function users(UserDataTable $dataTable){
        return $dataTable->render('profile.users');
    }

    function usersCreate() : View{
        $roles = Role::all();
        return view('profile.user-create', compact('roles'));
    }

    function usersStore(NewUserRequest $request) : RedirectResponse {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);

        Mail::to($user->email)->send(new NewUserMailable($request->all()));

        return redirect()->route('users.edit', $user);
    }

    function usersEdit(User $user) : View
    {
        $roles = Role::all();
        return view('profile.user-edit', compact('user','roles'));
    }

    function usersDestroy($id) : RedirectResponse {
        $user = User::findOrFail($id);

        if($user->status === 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }

        $user->save();

        toastr()->success('El usuario se ha actualizado exitosametne', 'Exito');
        return redirect()->back();
    }

    function roleCreate() : View {

        return view('profile.role-create');
    }
}
