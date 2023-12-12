<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
       return Carbon::now()->addDays(10);
    }
}
