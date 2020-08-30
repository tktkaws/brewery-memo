<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BreweryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('breweries.index'));

        $response->assertStatus(200)
            ->assertViewIs('breweries.index');
    }

    public function testGuestCreate()
    {
        $response = $this->get(route('breweries.create'));

        $response->assertRedirect(route('login'));
    }

    public function testAuthCreate()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('breweries.create'));

        $response->assertStatus(200)
            ->assertViewIs('breweries.create');
    }
}