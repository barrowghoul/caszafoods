<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardProfileUpdateRequest;
use App\Http\Requests\ProfilePasswordUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;

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

    function settings() : View {
        return view('profile.settings');
    }
}
