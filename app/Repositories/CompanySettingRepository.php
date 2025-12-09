<?php

namespace App\Repositories;

use App\Models\CompanySetting;
use App\Repositories\Interfaces\CompanySettingRepositoryInterface;

class CompanySettingRepository implements CompanySettingRepositoryInterface
{
    public function get()
    {
        return CompanySetting::first();
    }

    public function updateOrCreate(array $data)
    {
        return CompanySetting::updateOrCreate(
            $data
        );
    }
}
