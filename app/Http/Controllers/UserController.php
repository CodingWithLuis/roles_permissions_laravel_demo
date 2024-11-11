<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class);
    }
    public function index(): View
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }
}
