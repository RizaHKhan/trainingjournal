<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Inertia\Inertia;

use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Private/Settings');
    }

    public function update(UpdateUserRequest $request): Response
    {
        $validated = $request->validated();

        $request->user()->update($validated);

        return Inertia::render('Private/Settings');
    }
}
