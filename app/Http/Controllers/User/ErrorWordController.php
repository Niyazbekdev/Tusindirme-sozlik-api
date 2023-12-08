<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Word;

class ErrorWordController extends Controller
{
    public function index()
    {
        return Word::where('is_correct', false)->paginate(10);
    }
}
