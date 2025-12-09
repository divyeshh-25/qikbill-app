<?php

namespace App\Repositories\Interfaces;

use App\Models\CompanySetting;

interface CompanySettingRepositoryInterface
{
    public function get();
    public function updateOrCreate(array $data);
}
