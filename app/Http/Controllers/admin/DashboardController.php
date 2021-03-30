<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends BackendController
{

    public function index()
    {
        return view("admin.pages.dashboard",$this->data);
    }
}
