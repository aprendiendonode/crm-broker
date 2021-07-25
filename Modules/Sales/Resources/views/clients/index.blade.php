@extends('layouts.master')

@section('title',trans('sales.clients'))
@section('css')
<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">


<link rel="stylesheet" href="{{ asset('assets/css/intlcss/intlTelInput.css') }}" />
<script
src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"
integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw=="
crossorigin="anonymous"
></script>


@endsection
@section('content')
<div class="content p-3">
    
    
    
    <div class="d-flex justify-content-between mb-3">
        <h4>
            @lang('sales.manage_clients')
        </h4>
        
    
        @can('add_client')
            <button onclick="show_check_div()" type="button" class="btn btn-info waves-effect waves-light">
                <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('sales.add_clients')
            </button>
        @endcan 
    </div>
    
    @can('add_client')
    
    <div class="mb-2 check_client "  style="display: none;opacity:0;transition:0.7s">
        @include('sales::clients.check_before_create')
    </div>
    
    <div class="mb-2 add_client " @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
        @include('sales::clients.create')
    </div>
    @endcan
    
    
    <button class="btn btn-primary mb-2" onclick="show_filter()">@lang('sales.filter') <i class="fa fa-search"></i></button>   
    <a class="btn btn-outline-primary mb-2" href="{{ url('sales/clients/'.request('agency')) }}">@lang('sales.reset_filters')</a>
    
    <div class="mb-2 filter_client " @if(!request()->has('filter_name')) style="display: none;opacity:0;transition:0.7s" @endif>
        
        @include('sales::clients.filter')
        
    </div>    
    
    
@include('sales::clients.table')

    <div class="d-flex justify-content-between">
            
        <div class="mt-2">
            @if($pagination)
            {{ $clients->links() }}
            @endif
            
        </div>

    </div>
</div>
@can('manage_client_setting') 
@include('sales::clients.settings_modals')
@endcan

@endsection

@push('js')


<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>
<script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
{{-- <script src="{{ asset('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script> --}}

<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.select2-multiple').select2();
        $(".basic-datepicker").flatpickr();
        $(".clockpicker").clockpicker({
            twelvehour :false
        });

    
        
    })
</script>

<script>
    
    
    function  toggleCountryData(){
        var agency = @json($agency);
        var country = $('#nationality_id').val();
        
        
        
        
        var countries = @json($countries);
        filtered_country =  countries.filter(function(q){
            return q.id == country
        })
        
        $('#country option')
        .removeAttr('selected')
        .filter('[value='+filtered_country[0].value+']')
        .attr('selected', true)
        
        $('#country').val(filtered_country[0].value).change();
        // $('#country option[value='+filtered_country[0].value+']').attr('selected','selected');
        
        
        $('.country_code').val(filtered_country[0].phone_code);            
        $('.timezone').val(filtered_country[0].time_zone);            
        $('.country_flag').val(filtered_country[0].flag);            
        
        
        
    }
    
    function  toggleEditCountryData(id){
        var agency = @json($agency);
        var country = $('#nationality_id_'+id).val();
        
        
        
        
        var countries = @json($countries);
        filtered_country =  countries.filter(function(q){
            return q.id == country
        })
        
        $('#country_'+id +' option')
        .removeAttr('selected')
        .filter('[value='+filtered_country[0].value+']')
        .attr('selected', true)
        
        $('#country_'+id ).val(filtered_country[0].value).change();
        // $('#country option[value='+filtered_country[0].value+']').attr('selected','selected');
        
        
        $('.country_code').val(filtered_country[0].phone_code);            
        $('.timezone').val(filtered_country[0].time_zone);            
        $('.country_flag').val(filtered_country[0].flag);            
        
        
        
    }
</script>

<script>
    
    
    
    
    function  show_add_div(){
        var  div = document.querySelector('.add_client');
        if(div.style.display === 'none'){
            div.style.display = 'block';
            
            setTimeout(function(){
                
                div.style.opacity = 1;
                
            },10);
        } else {
            div.style.display = 'none';
            setTimeout(function(){
                
                div.style.opacity = 0;
                
                
            },10);
            
        }
        
    }
    
    
    
    
    
    
    function  show_filter(){
        var  div = document.querySelector('.filter_client');
        if(div.style.display === 'none'){
            div.style.display = 'block';
            
            setTimeout(function(){
                
                div.style.opacity = 1;
                
            },10);
        } else {
            div.style.display = 'none';
            setTimeout(function(){
                
                div.style.opacity = 0;
                
                
            },10);
            
        }
        
    }
    
    
    
    function  hide_add_div(){
        var  div = document.querySelector('.add_client');
        
        div.style.display = 'none';
        setTimeout(function(){
            
            div.style.opacity = 0;
            
            
        },10);
        
        
        
    }
    
 
    
    function hide_all(){
        $(".client-table tr:gt(1)").css('display','none');
        $(".client-table tr:gt(1)").css('opacity',0);
    }




    
function table_row_show(row_id,client=null,id){
 
 $('.table-row_'+row_id+':not(.'+id+')').addClass('d-none');

                        var exists = false;
                        var exists_value = null;
                        @if( session()->has('open-edit-tab') )
                        exists = true;
                        exists_value = @json(session('open-edit-tab'));
                        @endif 

                        if(client != null){

                            if(exists_value != client.id ){
                
                            exists =  false ;
                            }
                        }

        
        if(id == 'edit_client_'+row_id){

                if(exists == false && exists_value != client.id){
                                var edit_phone1 = document.querySelector(".phone1_"+row_id);
                                var edit_phone1_iti = window.intlTelInput(edit_phone1, {
                                
                                initialCountry: "auto",
                                utilsScript: "{{ asset('assets/js/util.js') }}",
                                });
                                if(client.phone1_symbol ){

                                    edit_phone1_iti.setCountry(client.phone1_symbol);
                                }



                                $('.phone1_'+row_id).change(function(){
                                    var number = edit_phone1_iti.getSelectedCountryData();
                                    if(edit_phone1_iti.isValidNumber() == false){
                                        $('.phone1_'+row_id).css({"border-color": "red", 
                                        "border-width":"1px", 
                                        "border-style":"solid"});
                                        formSubmit = false;
                                        return false;
                                    } else{
                                        $('.phone1_'+row_id).css({"border-color": "#ced4da", 
                                        "border-width":"1px", 
                                        "border-style":"solid"});
                                        formSubmit = true;
                                    }


                                
                                    var str = edit_phone1.value;
                                    if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                        formSubmit = false;
                                        $('.phone1_'+row_id).css({"border-color": "red", 
                                        "border-width":"1px", 
                                        "border-style":"solid"});
                                        return false;
                                    }else{

                                        $('.phone1_'+row_id).css({"border-color": "#ced4da", 
                                        "border-width":"1px", 
                                        "border-style":"solid"});
                                        formSubmit = true;
                                    }

                            
                                    
                                })

                                edit_phone1.addEventListener("countrychange", function() {
                                        number = edit_phone1_iti.getSelectedCountryData()           
                                        $('.edit_phone1_code_'+row_id).val(number.dialCode)
                                        $('.edit_phone1_symbol_'+row_id).val(number.iso2)
                                        if(edit_phone1.value != ''){
                                            var str = edit_phone1.value;
                                            if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                                formSubmit = false;
                                                $('.phone1_'+row_id).css({"border-color": "red", 
                                                "border-width":"1px", 
                                                "border-style":"solid"});
                                                return false;
                                            }else{

                                                $('.phone1_'+row_id).css({"border-color": "#ced4da", 
                                                "border-width":"1px", 
                                                "border-style":"solid"});
                                                formSubmit = true;
                                            }
                                        }
                                        if(!edit_phone1_iti.isValidNumber()){
                                                formSubmit = false;
                                                $('.phone1_'+row_id).css({"border-color": "red", 
                                                "border-width":"1px", 
                                                "border-style":"solid"});
                                                return false;
                                        }


                                });
                                





                                var edit_phone2 = document.querySelector(".phone2_"+row_id);
                                var edit_phone2_iti = window.intlTelInput(edit_phone2, {
                                
                                initialCountry: "auto",
                                utilsScript: "{{ asset('assets/js/util.js') }}",
                                });
                                if(client.phone2_symbol){

                                    edit_phone2_iti.setCountry(client.phone2_symbol);
                                }



                                $('.phone2_'+row_id).change(function(){
                                    var number = edit_phone2_iti.getSelectedCountryData();
                                    if(edit_phone2_iti.isValidNumber() == false){
                                        $('.phone2_'+row_id).css({"border-color": "red", 
                                        "border-width":"1px", 
                                        "border-style":"solid"});
                                        formSubmit = false;
                                        return false;
                                    } else{
                                        $('.phone2_'+row_id).css({"border-color": "#ced4da", 
                                        "border-width":"1px", 
                                        "border-style":"solid"});
                                        formSubmit = true;
                                    }


                                
                                    var str = edit_phone2.value;
                                    if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                        formSubmit = false;
                                        $('.phone2_'+row_id).css({"border-color": "red", 
                                        "border-width":"1px", 
                                        "border-style":"solid"});
                                        return false;
                                    }else{

                                        $('.phone2_'+row_id).css({"border-color": "#ced4da", 
                                        "border-width":"1px", 
                                        "border-style":"solid"});
                                        formSubmit = true;
                                    }

                            
                                    
                                })

                                edit_phone2.addEventListener("countrychange", function() {
                                        number = edit_phone2_iti.getSelectedCountryData()           
                                        $('.edit_phone2_code_'+row_id).val(number.dialCode)
                                        $('.edit_phone2_symbol_'+row_id).val(number.iso2)
                                        if(edit_phone2.value != ''){
                                            var str = edit_phone2.value;
                                            if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                                formSubmit = false;
                                                $('.phone2_'+row_id).css({"border-color": "red", 
                                                "border-width":"1px", 
                                                "border-style":"solid"});
                                                return false;
                                            }else{

                                                $('.phone2_'+row_id).css({"border-color": "#ced4da", 
                                                "border-width":"1px", 
                                                "border-style":"solid"});
                                                formSubmit = true;
                                            }
                                        }
                                        if(!edit_phone2_iti.isValidNumber()){
                                                formSubmit = false;
                                                $('.phone2_'+row_id).css({"border-color": "red", 
                                                "border-width":"1px", 
                                                "border-style":"solid"});
                                                return false;
                                        }


                                });




                                $('form[name="client-update-'+row_id+'"]').submit(function(e){
                                    return formEditSubmit == false ? event.preventDefault() : true;
                                });

                            }
            }





    if($('.'+id).hasClass('d-none')){
        $('.'+id).removeClass('d-none');
    }else{
        $('.'+id).addClass('d-none');

    }

}
function table_row_hide(id){
    
    $('.'+id).addClass('d-none');

}
 
</script>



@endpush
