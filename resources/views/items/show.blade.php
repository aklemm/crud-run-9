@can('show', $item)
    <h1>
        {{ $item->name }}

    </h1>

    <div>{{ $item->description }}
    </div>
    <div>
        <h2>Created by</h2>
        {{ $item->creator?->name }}
    </div>
@endcan
@can('delete', $item)
    <div style="display:inline-block">
        <form method="POST" action="{{ route('items.delete', ['item' => $item->id]) }}">
            @csrf
            @method('DELETE')

            <button>Delete</button>
        </form>
    </div>
@endcan
@can('index', \App\Models\Item::class)
    <div>
        <a href="{{ route('items.index') }}">See All</a>
    </div>
@endcan
