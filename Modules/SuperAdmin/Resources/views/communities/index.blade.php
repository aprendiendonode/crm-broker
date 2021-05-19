@extends('layouts.master')

@section('title',trans('superadmin.communities.communities'))
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
                   @lang('superadmin.communities.manage_communities')
               </h4>

              
                <button onclick="show_add_div()" type="button" class="btn btn-info waves-effect waves-light">
                    <span class="btn-label"><i class="fe-plus-square"></i></span>@lang('superadmin.communities.add_community')
                </button>
                
            </div>

            
            <div class="mb-2 add_type " @if(!session()->has('open-tab')) style="display: none;opacommunity:0;transition:0.7s" @endif>
                @include('superadmin::communities.create')
            </div>
        


            <div>
                @include('superadmin::communities.filter')

                <table  class="table table-bordered toggle-circle mb-0">
                    <thead>
                    <tr>
                        <th>@lang('superadmin.communities.name') </th>
                        <th>@lang('superadmin.communities.city') </th>
                        <th > @lang('superadmin.communities.controlls') </th>

                      
                    </tr>
                    </thead>
                    <tbody>

                        @forelse($communities as $community)
                        <tr>
                            <td>{{ $community->{'name_'.app()->getLocale()} }}</td>
                            <td>{{ $community->city ? $community->city->{'name_'.app()->getLocale()} : '' }}</td>
                              
                            <td>
                                @include('superadmin::communities.controlls')
                               
                            </td>

                        
                                @include('superadmin::communities.modals')
  
                        </tr>
                    

                            <tr  class="edit_team_{{ $community->id }}"  @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $community->id ))  @else style="display: none;opacommunity:0;transition:0.7s" @endif >
                                <td colspan="8">

                                    @include('superadmin::communities.edit')

                                </td>
                            </tr>

                    
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    @if($paginate)
                        <div class="mt-2">
                            {{ $communities->links() }}
                        </div>
                    @endif
 
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

            div.style.opacommunity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacommunity = 0;
   

        },10);

    }

    }

    

  function  hide_add_div(){
    var  div = document.querySelector('.add_type');
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacommunity = 0;
   

        },10);

    

    }



    
  function  show_edit_div(id){
 var  div = document.querySelector('.edit_team_'+id);
    if(div.style.display === 'none'){




        div.style.display = '';

        setTimeout(function(){

            div.style.opacommunity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacommunity = 0;
   

        },10);

    }

    }

    
  function  hide_edit_div(id){
    var  div = document.querySelector('.edit_team_'+id);
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacommunity = 0;
   

        },10);

    

    }
</script>

@endpush
