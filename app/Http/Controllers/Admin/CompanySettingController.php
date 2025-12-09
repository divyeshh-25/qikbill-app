<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    public function getCompanySetting(){
        return view('admin.settings.company-setting');
    }
}
