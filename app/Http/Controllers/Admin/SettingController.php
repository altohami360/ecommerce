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
    public function update(Request $request, Setting $setting)
    {
        $keys = $request->except(['_token', '_method']);

        foreach ($keys as $key => $value) {
            $s = $setting->where('key', $key)->firstOrFail();
            $s->value = $value;
            $s->saveOrFail();
        }

        return redirect()->route('settings.index')->with('toast_success', 'Update settings Successfuly');
    }
}
