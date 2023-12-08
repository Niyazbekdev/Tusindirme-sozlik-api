<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Word;

class RandomWordController extends Controller
{
    public function index()
    {
        $rand =  Word::inRandomOrder()->paginate(10);
        return $rand;
    }
}
