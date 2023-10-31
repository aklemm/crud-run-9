@can('create', \App\Models\Item::class)
<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input name="name"/>

    </div>
    <div>
        <label for="name">Description</label>
        <textarea name="description"></textarea>
    </div>
    <button>Save</button>
</form>
@else
    Sorry but you are not authorized to create Widgets. Please check with H.R.
@endcan
