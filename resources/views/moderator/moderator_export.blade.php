<table>
    <thead>
    <tr>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('moderator.name')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('moderator.email')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('moderator.primary_no')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('moderator.phone')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('moderator.listings_rent')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('moderator.listings_sell')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('moderator.listings_short') </th>
    </tr>
    </thead>
    <tbody>
    @foreach($staffs as $staff)
        <tr>
            <td>{{ $staff->{'name_'.app()->getLocale()} }}</td>
            <td>{{ $staff->email}}</td>
            <td>{{ $staff->country_code .'-'.$staff->city_code .'-'.$staff->phone}}</td>
            <td>{{ $staff->cell_code .'-'.$staff->cell }}</td>
            <td>{{ $staff->listings && $staff->listings->where('purpose', 'rent') ? $staff->listings->where('purpose', 'rent')->count() : 0 }}  </td>
            <td>{{ $staff->listings && $staff->listings->where('purpose', 'sale') ? $staff->listings->where('purpose', 'sale')->count() : 0 }}  </td>
            <td>{{ $staff->listings && $staff->listings->where('purpose', 'short') ? $staff->listings->where('purpose', 'short')->count() : 0 }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
