<table>
    <thead>
    <tr>
         <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('listing.id') </th>
         <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('listing.purpose') </th>
         <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('listing.type') </th>
         <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('listing.location') </th>
         <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('listing.area') </th>

         <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('listing.price') </th>
         <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('listing.assigned') </th>
         <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('listing.updated') </th>
         <th style="color:blue;border:5px solid black;padding:10px;width:30px;height:30px;font-weight:bold;font-size:20px;"> @lang('listing.status') </th>
       
    </tr>
    </thead>
    <tbody>
   @if($listings)
        @foreach($listings as $listing)
            <tr>
           
           
                <td>{{ $listing->listing_ref }}</td>
                <td>{{ Str::ucfirst($listing->purpose) }}</td>
                <td>{{ $listing->type ? $listing->type->{'name_'.app()->getLocale()} : '' }}</td>
                <td>
                    {{ $listing->location }}
             </td>
                <td>{{ number_format($listing->area)  }}</td>
                <td>{{ number_format($listing->price) }}</td>
                <td>{{ $listing->agent->{'name_'.app()->getLocale()} }}</td>
                <td>{{ $listing->updated_at->toFormattedDateString() }}</td>
                <td>{{ $listing->status }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>