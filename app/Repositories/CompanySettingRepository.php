<?php

namespace App\Repositories;

use App\Models\CompanySetting;
use App\Repositories\Interfaces\CompanySettingRepositoryInterface;

class CompanySettingRepository implements CompanySettingRepositoryInterface
{
    public function firstOrCreate(array $attributes, array $values): CompanySetting
    {
        return CompanySetting::firstOrCreate($attributes, $values);
    }

    public function find(int $id): ?CompanySetting
    {
        return CompanySetting::findOrFail($id);
    }

    public function update(CompanySetting $setting, array $data): CompanySetting
    {
        $setting->update($data);
        return $setting;
    }
}
