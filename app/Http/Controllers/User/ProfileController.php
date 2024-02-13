<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
        $this->middleware('user');
    }

    public function index(): View
    {
        $user = auth()->user();
        return view('user.profile.index', compact('user'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateProfileRequest $request, User $user): RedirectResponse
    {
        $this->authorize('update', $user);

        if (!$this->userRepository->updateProfile($request, $user)) {
            throw new \Exception('Update failed');
        }

        return redirect()->route('user.profile.index');
    }
}
