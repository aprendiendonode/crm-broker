<table>
    <thead>
    <tr>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('agency.name')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('agency.email')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('agency.primary_no')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('agency.phone')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('agency.listings_rent')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('agency.listings_sell')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($staffs as $staff)
        <tr>
            <td>{{ $staff->{'name_'.app()->getLocale()} }}</td>
            <td>{{ $staff->email}}</td>
            <td>{{ $staff->country_code .'-'.$staff->city_code .'-'.$staff->phone}}</td>
            <td>{{ $staff->cell_code .'-'.$staff->cell }}</td>
            <td>0</td>
            <td>0</td>
        </tr>
    @endforeach
    </tbody>
</table>