<?php

namespace App\Repositories\Interfaces;

use App\Models\CompanySetting;

interface CompanySettingRepositoryInterface
{
    public function firstOrCreate(array $attributes, array $values): CompanySetting;
    public function find(int $id): ?CompanySetting;
    public function update(CompanySetting $setting, array $data): CompanySetting;
}
