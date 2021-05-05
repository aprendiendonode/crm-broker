@extends('layouts.master')

@section('title',trans('listing.listing_type'))
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
                   @lang('listing.manage_listing_types')
               </h4>

              
                <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
                    <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('listing.add_type')
                </button>
                
            </div>

            
            <div class="mb-2 add_type " @if(!session()->has('open-tab')) style="display: none;opacity:0;transition:0.7s" @endif>
                @include('listing::settings.types.create')
            </div>
        


            <div>
                <table  class="table table-bordered toggle-circle mb-0">
                    <thead>
                    <tr>
                        <th>@lang('listing.name') </th>
                        <th>@lang('listing.type') </th>
                        <th>@lang('listing.reference') </th>
                        <th > @lang('listing.created_on') </th>
                        <th > @lang('listing.controlls') </th>

                      
                    </tr>
                    </thead>
                    <tbody>

                        @forelse($listing_types as $type)
                        <tr>
                            <td>{{ $type->{'name_'.app()->getLocale()} }}</td>
                            <td>{{ Str::ucfirst($type->type) }}</td>
                            <td>{{ $type->reference }}</td>
                            <td>{{ $type->created_at->toFormattedDateString() }}</td>
                   
           
                            <td>
                                @include('listing::settings.types.controlls')
                               
                            </td>

                        
                            @include('listing::settings.types.modals')
  
                        </tr>
                    

                            <tr  class="edit_team_{{ $type->id }}"  @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $type->id ))  @else style="display: none;opacity:0;transition:0.7s" @endif >
                                <td colspan="8">

                                    @include('listing::settings.types.edit')

                                </td>
                            </tr>

                    
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">

                    <div class="mt-2">
                        {{ $listing_types->links() }}
                    </div>
 
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


    })
</script>

<script>




function  show_add_div(){
 var  div = document.querySelector('.add_type');
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
    var  div = document.querySelector('.add_type');
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }



    
  function  show_edit_div(id){
 var  div = document.querySelector('.edit_team_'+id);
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
    var  div = document.querySelector('.edit_team_'+id);
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }
</script>

@endpush
