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
            <td>{{$item->failed_data}} </td>
        </tr>
    @empty
    @endforelse
    </tbody>
</table>
