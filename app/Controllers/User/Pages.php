<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function about()
    {
        return view('user/layout/about');
    }
}
