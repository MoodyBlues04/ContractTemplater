<?php

namespace App\Repositories;

use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function updateProfile(UpdateProfileRequest $request, User $user): bool
    {
        $attributes = $request->only('name', 'email', 'phone');
        if ($password = $request->get('password')) {
            $attributes['password'] = Hash::make($password);
        }
        return $this->update($attributes, $user);
    }
}
