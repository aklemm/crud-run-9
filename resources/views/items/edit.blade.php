@can('edit', $item)
<form action="{{ route('items.update', ['item' => $item->slug]) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name</label>
        <input name="name" value="{{ $item->name }}"/>
        @error('name')
        @foreach($errors->get('name') as $error)
            {{ $error }}
        @endforeach
        @enderror
    </div>
    <div>
        <label for="name">Description</label>
        <textarea name="description">{{ $item->description }}</textarea>
        @error('description')
        @foreach($errors->get('description') as $error)
            {{ $error }}
        @endforeach
        @enderror
    </div>
    <button>Update</button>
</form>
@else
    Sorry but you need to scram.
@endcan
