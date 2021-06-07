<table>
    <thead>
    <tr>
        <th>Lead Id</th>
        <th>Failed Data</th>
    </tr>
    </thead>
    <tbody>
    @forelse($failed_leads as $item)
        <tr>
            <td>{{ $item->reference ?? '' }}</td>
            @forelse(json_decode($item->failed_data) as $key => $data)
                @if($key != 0)
                    &
                @endif
                {{$data}}
            @empty
            @endforelse
        </tr>
    @empty
    @endforelse
    </tbody>
</table>
