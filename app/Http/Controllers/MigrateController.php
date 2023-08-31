<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class MigrateController extends Controller
{
    public function runMigrate() {
        Artisan::call('migrate');
    }
}


