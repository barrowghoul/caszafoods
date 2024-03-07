<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\SettingsServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function notification_settings() : View {

        return view ('settings.notifications');
    }

    function updateEmailSettings(Request $request){
        if(!$request->has('use_email')){
            $request['use_email'] = false;
            $validatedData = $request->validate([
                'use_email' => [ 'max:10'], // 'use_email' => 'required|boolean',
            ]);
        }else{
            $validatedData = $request->validate([
                'use_email' => [ 'max:10'], // 'use_email' => 'required|boolean',
                'email_host' => ['required', 'max:255'],
                'email_port' => ['required', 'max:6'],
                'email_username' => ['required', 'max:100'],
                'email_password' => ['required', 'max:100'],
                'email_encryption' => ['required', 'max:10'],
                'email_address' => ['required', 'email', 'max:255'],
            ]);
        }

        foreach($validatedData as $key => $value){
            Setting::updateorcreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $this->clearCache();

        toastr()->success("Configuracion actualizada correctamente!");
        return redirect()->back();
    }

    function updatePusherSettings(Request $request) : RedirectResponse{
        if($request->has('use_pusher')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('use_pusher', $newValue);

        $validatedData = $request->validate([
            'pusher_app_id' => 'required',
            'pusher_app_key' => 'required',
            'pusher_app_secret' => 'required',
            'pusher_app_cluster' => 'required',
        ]);

        foreach($validatedData as $key => $value){
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );

        }

        $this->clearCache();

        toastr()->success("{{ __('Updated Successfully!') }}");
        return redirect()->back();
    }

    function updateNotificationSettings(Request $request) : RedirectResponse {

        if($request->has('notify_vendor')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_vendor', $newValue);

        if($request->has('notify_req_admin')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_req_admin', $newValue);

        if($request->has('notify_req_purchase')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_req_purchase', $newValue);

        if($request->has('notify_req_purchase_admin')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_req_purchase_admin', $newValue);

        if($request->has('notify_req_inventory')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_req_inventory', $newValue);

        if($request->has('notify_oc_admin')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_oc_admin', $newValue);

        if($request->has('notify_oc_purchase')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_oc_purchase', $newValue);

        if($request->has('notify_oc_purchase_admin')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_oc_purchase_admin', $newValue);

        if($request->has('notify_oc_inventory')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_oc_inventory', $newValue);

        if($request->has('notify_reception_admin')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_reception_admin', $newValue);

        if($request->has('notify_reception_purchase')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_reception_purchase', $newValue);

        if($request->has('notify_reception_purchase_admin')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_reception_purchase_admin', $newValue);

        if($request->has('notify_reception_inventory')){
            $newValue = true;
        }
        else{
            $newValue = false;
        }
        $this->saveSetting('notify_reception_inventory', $newValue);

        $this->clearCache();

        toastr()->success('La configuracion se guardo correctamente!');
        return redirect()->back();
    }

    function clearCache() : void {
        $settingsService = app(SettingsServices::class);
        $settingsService->clearCachedSettings();
    }

    function saveSetting(string $key, bool $value) : void {
        try{
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );

        } catch (\Exception $e){
            toastr()->error($e->getMessage());
        }
    }
}
