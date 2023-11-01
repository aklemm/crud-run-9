<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Item $item, Request $request): View
    {
        $this->authorize('show', $item);

        return view('items.show', [
            'item' => $item,
        ]);
    }
}
