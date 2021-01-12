<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Tenant\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::all();

        return view('tenant.users.index', compact('users'));
    }
}
