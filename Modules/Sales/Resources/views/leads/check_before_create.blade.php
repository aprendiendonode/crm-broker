<div class="mb-5">

    <div class="row">
        
 
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.phone')</label>
                    <div class="d-flex">
                  
                        <div class="" style="flex:4">
                            <input type="text" class="form-control phone_check" data-plugin="tippy" data-tippy-placement="top-start"
                             title="@lang('agency.phone')"  name="phone_check" >
                        </div>
                    </div>
                </div>
            </div>

{{-- 
            <div class="col-md-6 col-lg-4">
                <label class="mb-1 font-weight-medium text-muted">@lang('agency.email')</label>

                <input type="text" name="email_check" id="autocomplete-ajax"
                           class="form-control email_check"
                          />


            </div> 
    --}}
            <div class="col-md-6 col-lg-4 mt-3">

                <button class="btn btn-primary" onclick="check_lead('{{ $business }}','{{ $agency }}',"{{ url('sales/leads/'.$agency) }}",
                '{{ trans('sales.found_lead') }}', '{{ trans("sales.not_found_lead") }}',)
                " >@lang('sales.check')</button>
                <button class="btn btn-success" onclick="event.preventDefault();show_add_div()" >@lang('sales.create_directly')</button>
            </div>
            <div class="col-md-12 col-lg-12 mt-1">

              <p class="check-result" style="font-size:20px;"></p>
            </div>
    </div>

</div>


@push('js')
    <script>

      function check_lead(business,agency,url,found,not_found){
           var phone = $('.phone_check').val();
            var filtered_leads = [];
          var agency   =  agency;
          var business =  business;

          $.ajax({
              url:"{{ route('leads.check_before_create')  }}",
              type:'POST',
              data:{
                  phone : phone,
                  agency  : agency,
                  business: business,
                  _token  :'{{ csrf_token() }}'
              },
              success: function(data){

                  filtered_leads = data.leads;
                  console.log(filtered_leads.length);


                  if(filtered_leads.length > 0){
                      var result_words = found
                      var url = url
                      var link = '<a href="'+url+'?filter_phone='+phone+'"> Here </a>'
                      $('.check-result').text(filtered_leads.length  +' '+result_words )
                      $('.check-result').append(link)

                  } else {

                      var result_words = not_found
                      $('.check-result').text(result_words)
                  }


              },
              error: function (error) {

              }
          });




        }
    </script>
@endpush