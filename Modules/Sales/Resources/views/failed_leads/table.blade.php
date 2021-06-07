<div class="table-responsive">
    <table class="table table-bordered toggle-circle mb-0">
        <thead>
        <tr>
            <th>@lang('sales.reference') </th>
            <th> @lang('sales.failed_data') </th>

            <th> @lang('sales.controlls') </th>

        </tr>
        </thead>
        <tbody>

        @forelse($failed_leads as $lead)

            <tr>
                <td>{{ $lead->reference }}</td>
                <td>
                    @forelse(json_decode($lead->failed_data) as $key => $item)
                        @if($key != 0)
                            &
                            @endif
                        {{$item}}
                        @empty
                        @endforelse
                       </td>
                <td>
                    <a href="{{url('sales/leads/'.$agency.'?filter_reference='.$lead->reference)}}"> <i

                            data-plugin="tippy"
                            data-tippy-placement="top-start"
                            title="@lang('settings.view')"

                            class="fe-eye cursor-pointer feather-16">
                        </i>
                    </a>
                </td>

            </tr>

        @empty
            <tr>
                <td colspan="8">
                    @lang('sales.no_result_for_failed_leads')
                </td>
            </tr>
        @endforelse


        </tbody>
    </table>

</div>

</div>
