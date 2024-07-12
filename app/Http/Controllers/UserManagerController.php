<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;

class UserManagerController extends Controller
{
    /**
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        $users = User::all();
//        return response()->json($users);
        return Inertia::render('Dashboard', [
            "users" => User::all()
        ]);

    }
}
