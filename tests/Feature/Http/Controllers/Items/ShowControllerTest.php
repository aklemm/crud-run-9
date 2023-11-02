<?php

namespace Tests\Feature\Http\Controllers\Items;

use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_route_shows_item(): void
    {
        $user = User::factory()->create();

        $item = Item::factory()->create(['created_by' => $user->id]);

        $response = $this->actingAs($user)->get(route('items.show', ['item' => $item->slug]));

        $response->assertStatus(200);

        $response->assertSeeText($item->name);
        $response->assertSeeText($item->description);
        $response->assertSeeText($item->creator->name);
    }
}
