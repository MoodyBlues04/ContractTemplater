<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
        $this->middleware('admin');
    }

    public function index(): View
    {
        $users = $this->userRepository->getAll();
        return view('admin.user.index', compact('users'));
    }
}
