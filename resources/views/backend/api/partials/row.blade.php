<tr>
    <td>
        @if (auth()->user()->hasPermission('api.edit'))
            <a href="{{ route('backend.api.edit', $api_item->id) }}">{{ $api_item->keygen }}</a>
        @else
            {{ $api_item->keygen }}
        @endif
    </td>
    <td>{{ $api_item->ip }}</td>
    <td>{{ $api_item->update_endpoint }}</td>
    <td>{{ $api_item->get_endpoint }}</td>
    <td>
        @if ($api_item->shop)
            {{ $api_item->shop->name }}
        @endif
    </td>
    <td>
        <small><i class="fa fa-circle @if ($api_item->status) text-green @else text-red @endif"></i></small>
    </td>
</tr>
