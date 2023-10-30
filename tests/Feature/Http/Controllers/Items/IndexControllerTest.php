<?php

namespace Tests\Feature\Http\Controllers\Items;

use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_url_is_as_expected(): void
    {
        $this->assertSame(route('items.index'), url('/items'));
    }

    public function test_index_route_shows_items(): void
    {
        $user = User::factory()->create();

        $items = Item::factory()->count(3)->create(['created_by' => $user->id]);

        $response = $this->actingAs($user)->get(route('items.index'));

        $response->assertStatus(200);

        foreach ($items as $item) {
            $response->assertSeeText($item->name);
            $response->assertSeeText($item->description);
            $response->assertSeeText($item->creator->name);
        }
    }
}
