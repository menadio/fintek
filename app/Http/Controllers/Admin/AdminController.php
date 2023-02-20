<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Events\AdminCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Index', [
            'admins' => User::where('type', UserType::ADMIN)
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/Create', [
            'isSuperAdmin' => auth()->user()->type->isSuperAdmin(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAdminRequest $request): RedirectResponse
    {
        // create admin user account
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(Str::password(8)),
            'phone' => $request->phone,
            'type' => UserType::ADMIN,
        ]);

        // emit admin created event
        AdminCreated::dispatch($admin);

        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin): \Inertia\Response
    {
        return Inertia::render('Admin/Show', [
            'admin' => $admin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
