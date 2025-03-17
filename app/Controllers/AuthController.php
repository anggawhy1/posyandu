<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function login()
    {
        return redirect()->to('/dashboard/admin'); // Arahkan langsung ke dashboard/admin
    }
}
