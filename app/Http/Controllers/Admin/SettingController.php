<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;


class SettingController extends Controller
{
    use UploadAble;

    public function index()
    {
        return view('admin.settings.index');
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        
        if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {
            
            if (config('settings.site_logo') != null) {
                $this->deleteOne(config('settings.site_logo'));
            }
            
            $logo = $this->uploadOne($request->file('site_logo'), 'img');
            
            Setting::set('site_logo', $logo);
            
        } elseif ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {
            
            if (config('settings.site_favicon') != null) {
                $this->deleteOne(config('settings.site_favicon'));
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
            Setting::set('site_favicon', $favicon);
        } else {
            
            $keys = $request->except(['_token', '_method']);
            
            foreach ($keys as $key => $value) {
                Setting::set($key, $value);
            }
        }
        return redirect()->route('settings.index')->with('toast_success', 'Update settings Successfuly');
    }
}
