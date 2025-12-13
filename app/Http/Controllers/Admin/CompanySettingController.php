<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanySettingController extends Controller
{
    public function getCompanySetting()
    {
        $companySetting = CompanySetting::firstOrCreate(
            ['tenant_id' => 1],
            [
                'name' => 'Default Company',
                'email' => null,
                'address' => null,
                'logo' => null,
                'favicon' => null,
                'show_logo_or_name' => 'logo',
            ]
        );
        return view('admin.settings.company-setting', compact('companySetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,png,jpeg,ico|max:2048',
            'show_logo_or_name' => 'required|in:logo,name',
        ]);

        $setting = CompanySetting::findOrFail($id);

        if ($request->hasFile('logo')) {
            if ($setting->logo && Storage::exists('public/' . $setting->logo)) {
                Storage::delete('public/' . $setting->logo);
            }
            $logoPath = $request->file('logo')->store('company/logo', 'public');
            $setting->logo = $logoPath;
        }

        if ($request->hasFile('favicon')) {
            if ($setting->favicon && Storage::exists('public/' . $setting->favicon)) {
                Storage::delete('public/' . $setting->favicon);
            }
            $faviconPath = $request->file('favicon')->store('company/favicon', 'public');
            $setting->favicon = $faviconPath;
        }

        $setting->name = $request->name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->show_logo_or_name = $request->show_logo_or_name;

        $setting->save();

        return redirect()->back()->with('success', 'Company settings updated successfully!');
    }
}
