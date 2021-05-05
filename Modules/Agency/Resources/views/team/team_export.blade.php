<table>
    <thead>
    <tr>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('agency.name')</th>
        <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;">@lang('agency.members')</th>
       
    </tr>
    </thead>
    <tbody>
    @foreach($teams as $team)
        <tr>
            <td>{{ $team->{'name_'.app()->getLocale()} }}</td>
            <td>{{ $team->members ? $team->members->count() : 0 }}</td>
 
        </tr>
    @endforeach
    </tbody>
</table>