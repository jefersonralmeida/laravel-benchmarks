<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    public function version()
    {
        return app()->version();
    }
}
