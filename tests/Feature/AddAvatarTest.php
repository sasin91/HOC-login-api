<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AddAvatarTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function only_members_can_add_avatars()
    {
        $this->json('POST', route('user.photo', 1))
            ->assertStatus(401);
    }

    /** @test */
    public function a_valid_avatar_must_be_provided()
    {
        Passport::actingAs($user = factory(User::class)->create());

        $this->json('POST', route('me.photo'), [
            'avatar' => 'not-an-image'
        ])->assertStatus(422);
    }

    /** @test */
    public function a_user_may_add_an_avatar_to_their_profile()
    {
        Passport::actingAs(factory(User::class)->create());

        Storage::fake('public');

        $this->json('POST', route('me.photo'), [
            'photo' => $file = UploadedFile::fake()->image('photo.jpg')
        ]);

        $this->assertEquals(asset('avatars/'.$file->hashName()), auth()->user()->photo_url);

        Storage::disk('public')->assertExists('avatars/' . $file->hashName());
    }
}
