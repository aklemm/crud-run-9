@can('index', \App\Models\Item::class)
    <table>
        <tr>
            <th>
                Name
            </th>
            <th>
                Description
            </th>
            <th>
                Creator
            </th>
        </tr>
    @foreach($items as $item)
        <tr>
            <td>
                {{ $item->name }}
            </td>
            <td>
                {{ $item->description }}
            </td>
            <td>
                {{ $item->creator?->name }}
            </td>
        </tr>
    @endforeach
    {{ $items->links() }}
    </table>
@endcan
