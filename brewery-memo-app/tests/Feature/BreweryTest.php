<?php

namespace Tests\Feature;

use App\Brewery;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BreweryTest extends TestCase
{
    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $brewery = factory(Brewery::class)->create();

        $result = $brewery->isLikedBy(null);

        $this->assertFalse($result);
    }

    public function testIsLikedByTheUser()
    {
        $brewery = factory(Brewery::class)->create();
        $user = factory(User::class)->create();
        $brewery->likes()->attach($user);

        $result = $brewery->isLikedBy($user);

        $this->assertTrue($result);
    }

    public function testIsLikedByAnother()
    {
        $brewery = factory(Brewery::class)->create();
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();
        $brewery->likes()->attach($another);

        $result = $brewery->isLikedBy($user);

        $this->assertFalse($result);
    }
}