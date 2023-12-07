<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HistoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $user = User::where('role_id', 2)->get();
        return UserResource::collection($user);
    }
}
