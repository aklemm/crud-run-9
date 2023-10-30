<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request): View
    {
        $this->authorize('index', Item::class);

        return view('items.index', [
            'items'=>Item::query()->where('created_by', '=', $request->user()->id)->get(),
        ]);
    }
}
