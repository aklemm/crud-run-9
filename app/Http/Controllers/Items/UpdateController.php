<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(Item $item, UpdateRequest $request):RedirectResponse
    {
        $this->authorize('update', $item);

        $item->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        return redirect()->route('items.index');
    }
}
