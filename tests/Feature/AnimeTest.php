<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnimeTest extends TestCase
{

    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $attributes = [
            'title' => $this->faker->title(),
            'title_id' => 5,
            'thumbnail' => new \Illuminate\Http\UploadedFile('F:\Studying\laravel\myOwn\animusic\public\assets\media\avatars\150-1.jpg', 'large-avatar.jpg', null, null, true),
            'number_of_tracks' => 5,
            'composer' => $this->faker->name(),
            'date_released'=> $this->faker->time(),
            'album_length' => '15:15',
            'active' => $this->faker->boolean()
        ];

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/album/create',$attributes);

            $response->assertStatus(302);
            $this->assertDatabaseHas('albums',$attributes);

    }
}
