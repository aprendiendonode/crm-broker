@extends('layouts.master')

@section('title',trans('agency.staff'))
@section('css')


<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css">



<style>


    .toggle.android { border-radius: 0px;}
    .toggle.android .toggle-handle { border-radius: 0px; }
  
      .custom-toggle .btn {
          padding:0 !important;
      }
      .custom-toggle .toggle.btn {
          min-height: 26px;                                
          min-width: 46px;
      }
  </style>
<!-- icons -->


@endsection
@section('content')
<div class="content p-3">



            <div class="d-flex justify-content-between mb-3">
               <h4>
                   @lang('agency.manage_staff')
               </h4>

               @can('add_staff')
                <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
                    <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('agency.add_staff')
                </button>
                @endcan 
            </div>

            @can('add_staff')
            <div class="mb-2 add_staff " @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
                @include('agency::staff.create')
            </div>
            @endcan


            @include('agency::staff.filter')

            <div>
                <table  class="table table-bordered toggle-circle mb-0">
                    <thead>
                    <tr>
                        <th>@lang('agency.name') </th>
                        <th > @lang('agency.email') </th>
                        <th > @lang('agency.primary_no') </th>
                        <th > @lang('agency.secondry_no') </th>
                        <th > @lang('agency.team') </th>
                        <th > @lang('agency.listings_rent') </th>
                        <th > @lang('agency.listings_sell') </th>
                        <th > @lang('agency.controlls') </th>
                      
                    </tr>
                    </thead>
                    <tbody>

                        @forelse($staffs as $staff)
                        <tr>
                            <td>{{ ucfirst( $staff->{'name_'.app()->getLocale()} )}}</td>
                            <td>{{ $staff->email}}</td>
                            <td>{{ $staff->phone}}</td>
                            <td>{{ $staff->cell }}</td>
                            <td>{{  $staff->team ? ucfirst( $staff->team->{'name_'.app()->getLocale()} ) : '' }}</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                @include('agency::staff.controlls')
                               
                            </td>

                        
                            @include('agency::staff.modals')
  
                        </tr>
                        @can('edit_staff')

                            <tr  class="edit_staff_{{ $staff->id }}"  @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $staff->id ))  @else style="display: none;opacity:0;transition:0.7s" @endif >
                                <td colspan="8">

                                    @include('agency::staff.edit',['edited_staff' => $staff])

                                </td>
                            </tr>

                        @endcan
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">

                    <div class="mt-2">
                        {{ $staffs->links() }}
                    </div>
                    @can('can_generate_reports')
                    <a 
                    data-plugin="tippy" 
                    data-tippy-placement="bottom-start" 
                    title="@lang('agency.export_help')" href="{{ url('agency/export/'.request('agency')) }}" class="mt-2">@lang('agency.generate_report')
                    </a>
                    @endcan
                </div>
            </div>
            
        </div>

       
@endsection

@push('js')


<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>


<script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<!-- Footable js -->
<script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>

{{-- tooltip --}}
<script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>

<!-- Init js -->
{{-- <script src="{{ asset('assets/js/pages/foo-tables.init.js') }}"></script> --}}
    <!-- Plugins js -->
<script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>

<!-- Init js-->
<script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="{{ asset('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>




<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>


<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.select2-multiple').select2();

        var  staffs = @json($staffs);
        for(var i = 0; i < staffs.data.length; i++){
            
        ClassicEditor
            .create(document.querySelector('#description_edit_en_'+staffs.data[i].id))
            .then()
            .catch(error => {

            });

            ClassicEditor
        .create( document.querySelector( '#description_edit_ar_'+staffs.data[i].id ),{
            language: 'ar'
        } )
        .then( )
        .catch( error => {

        } );
        }

    })
</script>

<script>




function  show_add_div(){
 var  div = document.querySelector('.add_staff');
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
    var  div = document.querySelector('.add_staff');
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }



    
  function  show_edit_div(id){
 var  div = document.querySelector('.edit_staff_'+id);
    if(div.style.display === 'none'){




        div.style.display = '';

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

    
  function  hide_edit_div(id){
    var  div = document.querySelector('.edit_staff_'+id);
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }
</script>


<script>

    function toggle_desc(){
        type = $('.description').prop('checked');
        if(type == true){
    //english
                $('.description_en').removeClass('d-none');
                $('.description_ar').addClass('d-none');
        } else {
                    $('.description_en').addClass('d-none');
                    $('.description_ar').removeClass('d-none');


        }
        }

ClassicEditor
    .create(document.querySelector('#description_en'))
    .then()
    .catch(error => {

    });

    ClassicEditor
.create( document.querySelector( '#description_ar' ),{
    language: 'ar'
} )
.then( )
.catch( error => {

} );




function toggle_edit_desc(id){
        type = $('.description_edit_'+id).prop('checked');
        if(type == true){
    //english
                $('.description_edit_en_'+id).removeClass('d-none');
                $('.description_edit_ar_'+id).addClass('d-none');
        } else {
                    $('.description_edit_en_'+id).addClass('d-none');
                    $('.description_edit_ar_'+id).removeClass('d-none');


        }
        }


    var emails = @json($emails);
     
     $('#autocomplete-ajax').autocomplete({
         lookup: emails
     } );


    //  (".selectize-maximum").selectize({maxItems:3})


</script>
@endpush
