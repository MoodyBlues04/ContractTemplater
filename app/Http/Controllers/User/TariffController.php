<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\TariffRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TariffController extends Controller
{
    public function __construct(private TariffRepository $tariffRepository)
    {
        $this->middleware('user');
    }

    public function index(): View
    {
        $tariffs = $this->tariffRepository->getAll();
        return view('user.tariff', compact('tariffs'));
    }
}
