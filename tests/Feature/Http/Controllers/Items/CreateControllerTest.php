<?php

namespace Tests\Feature\Http\Controllers\Items;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_url_is_as_expected(): void
    {
        $this->assertSame(route('items.create'), url('/items/create'));
    }
}
