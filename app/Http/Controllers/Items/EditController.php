<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Item $item, Request $request): View
    {
        $this->authorize('edit', $item);

        return view('items.edit', [
            'item' => $item,
        ]);
    }
}
