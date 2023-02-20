<?php

use App\Enums\UserType;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

it('has admin page', function () {
    login()->get(route('admins.index'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('Admin/Index')
            ->has('admins')
        );
});

it('has create admin page', function () {
    login()->get(route('admins.create'))
        ->assertStatus(200)
        ->assertInertia(fn (Assert $page) => $page
            ->component('Admin/Create')
        );
});

test('assert can create new admin', closure: function () {
    $name = fake()->name;
    $email = fake()->email;
    $phone = fake()->phoneNumber;

    login()->post(route('admins.store'), [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
    ])
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('admins.index')
        );

    expect(User::where('type', UserType::ADMIN)->count())->toBeGreaterThan(0)
        ->and(User::where('type', UserType::ADMIN)->latest()->first())
        ->email->toBe($email)->toContain('@')
        ->name->toBe($name)
        ->phone->toBe($phone);

    $admin = User::where('type', UserType::ADMIN)->latest()->first();

    return $admin;
});

test('can view admin details', function ($admin) {
    login()->get(route('admins.show', $admin, false))
        ->assertOk();
})->depends('assert can create new admin');
