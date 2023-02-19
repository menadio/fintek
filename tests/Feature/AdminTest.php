<?php

use App\Enums\UserType;
use App\Models\User;
use Inertia\Testing\AssertableInertia;

beforeEach(function () {
    $this->superadmin = User::factory()
        ->make([
            'type' => UserType::SUPERADMIN
        ]);

    User::factory()->count(5)
        ->make(['type' => UserType::ADMIN]);
});

it('has admin page', function () {
    $this->withoutExceptionHandling()
        ->actingAs($this->superadmin, 'web')
        ->get('/admin/administrators')
        ->assertStatus(200)
        ->assertInertia(fn(AssertableInertia $page) => $page
            ->component('Admin/Index')
            ->has('admins')
        );
});

it('has create admin page', function () {
    $this->actingAs($this->superadmin, 'web')
        ->get('/admin/administrators/create')
        ->assertStatus(200)
        ->assertInertia(fn(AssertableInertia $page) => $page
            ->component('Admin/Create')
        );
});

test('assert super admin can create admin account', function () {
    $this->actingAs($this->superadmin, 'web')
        ->post('/admin/administrators', [
            'name' => 'Sammy King',
            'email' => 'sammy@example.com',
            'password' => 'password',
            'phone' => '08011111111'
        ])
        ->assertStatus(302);
})->depends('it has create admin page');
