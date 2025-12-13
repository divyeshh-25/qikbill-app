<?php

namespace App\Services;

use App\Models\CompanySetting;
use App\Repositories\Interfaces\CompanySettingRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class CompanySettingService
{
    protected CompanySettingRepositoryInterface $repo;

    public function __construct(CompanySettingRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getOrCreateCompanySetting(int $tenantId = 1): CompanySetting
    {
        return $this->repo->firstOrCreate(
            ['tenant_id' => $tenantId],
            [
                'name' => 'Default Company',
                'email' => null,
                'phone' => null,
                'address' => null,
                'logo' => null,
                'favicon' => null,
                'show_logo_or_name' => 'logo',
            ]
        );
    }

    public function updateCompanySetting($setting, array $data)
    {
        if (!empty($data['logo']) && $data['logo'] instanceof UploadedFile) {
            if ($setting->logo && Storage::exists('public/' . $setting->logo)) {
                Storage::delete('public/' . $setting->logo);
            }
            $setting->logo = $data['logo']->store('company/logo', 'public');
        }

        if (!empty($data['favicon']) && $data['favicon'] instanceof UploadedFile) {
            if ($setting->favicon && Storage::exists('public/' . $setting->favicon)) {
                Storage::delete('public/' . $setting->favicon);
            }
            $setting->favicon = $data['favicon']->store('company/favicon', 'public');
        }

        $setting->fill([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'],
            'show_logo_or_name' => $data['show_logo_or_name'],
        ]);

        $setting->save();

        return $setting;
    }
}
