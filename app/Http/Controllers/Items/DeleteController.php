<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Item $item, Request $request): RedirectResponse
    {
        $this->authorize('delete', $item);

        $item->delete();

        return redirect()->route('items.index');
    }
}
