<?php

namespace Tests\Feature\Tweet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tweet;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_delete_successed(): void
    {
        $user = User::factory()->create(); //ユーザー作成

        $tweet = Tweet::factory()->create(['user_id' => $user->id]); //つぶやき作成

        $this->actingAs($user); // 指定したユーザーでログイン状態にする
        
        $response = $this->delete('/tweet/delete/' . $tweet->id); //作成されたつぶやきID作成

        $response->assertRedirect('/tweet');
    }
}
