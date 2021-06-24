<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::first();

        return view('admin.setting.update', [
            'setting' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'company' => 'required|max:255',
        ]);

        $setting = Setting::findorFail($id); // object
        $setting->company = $request->input('company');
        $setting->phone = $request->input('phone');
        $setting->hotline = $request->input('hotline');
        $setting->address = $request->input('address');
        $setting->address2 = $request->input('address2');
        $setting->tax = $request->input('tax');
        $setting->facebook = $request->input('facebook');
        $setting->email = $request->input('email');
        $setting->introduce = $request->input('introduce');

        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($setting->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/setting/';
            // upload file
            $request->file('new_image')->move($path_upload,$filename);

            $setting->image = $path_upload.$filename;
        }

        $setting->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.setting.index');
    }
}
