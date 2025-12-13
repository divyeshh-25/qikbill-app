<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanySettingRequest;
use App\Models\CompanySetting;
use App\Services\CompanySettingService;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    protected CompanySettingService $service;

    public function __construct(CompanySettingService $service)
    {
        $this->service = $service;
    }

    public function getCompanySetting()
    {
        $companySetting = $this->service->getOrCreateCompanySetting();
        return view('admin.settings.company-setting', compact('companySetting'));
    }

    public function update(CompanySettingRequest $request,CompanySetting $companySetting)
    {
        $data = $request->validated();
        $this->service->updateCompanySetting($companySetting, $data);
        return redirect()->back()->with('success', 'Company settings updated successfully!');
    }
}
