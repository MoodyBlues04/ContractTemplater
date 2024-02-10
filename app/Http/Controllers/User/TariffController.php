<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TariffController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index(): View
    {
        return view('user.tariff');
    }
}
