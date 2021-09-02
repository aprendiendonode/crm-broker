@extends('layouts.master')
@section('css')
@endsection


@section('content')
<div class="content p-3">
    <form action="{{ url('agency/update_privileges') }}" method="POST">
        @csrf
        <input type="hidden" name="staff_id" value="{{ $staff->id }}">
            <div class="row">
            @forelse($permission_groups as $group)

                <div class="col-md-4">
                <h4> {{ ucfirst( str_replace('_'," ",$group->name)) }}</h4>
                    
                    @forelse($group->permissions as $permission )

                        <div class="checkbox checkbox-danger checkbox-circle mb-2">
                            <input @if(in_array($permission->id,$permissions)) checked @endif id="{{  $permission->id}}" value="{{  $permission->id}}" name="permission[]" type="checkbox" >
                            <label for="{{ $permission->id }}">
                                {{ ucfirst( str_replace('_'," ",$permission->name)) }}
                            </label>
                        </div>
                    @empty
                    @endforelse
                </div>
            @empty
            @endforelse
            </div>

            
            <div class="d-flex justify-content-between  mt-3 ">

                <div class="ml-3">

                    <a href="{{ url('agency/staff/'.request('agency').'/?page='.(request('page') ? request('page') : 1 )) }}" style="color: white;"  class="btn btn-success waves-effect waves-light">
                        @lang('agency.cancel')
                    </a> 
                </div>
          
            <div class="d-flex flex-row-reverse">

                <div class="ml-3">

                    <button  type="submit" class="btn btn-success waves-effect waves-light">
                        <span class="btn-label"><i class="fe-check"></i></span>@lang('agency.submit_save')
                    </button>
                </div>
                <div class="ml-3">

                    <button onclick="event.preventDefault();default_select()" type="button" class="btn btn-success waves-effect waves-light">
                        @lang('agency.default')
                    </button> 
                </div>
                <div class="ml-3">

                    <button onclick="event.preventDefault();selects()" type="button" class="btn select btn-success waves-effect waves-light">
                        @lang('agency.select_all')
                    </button> 

                    <button onclick="event.preventDefault();deSelect()" type="button" class="d-none dselect btn btn-success waves-effect waves-light">
                        @lang('agency.remove_select')
                    </button> 
                </div>

        

              
               
            </div>
       
        </div>

    </form>
</div> 


@endsection

@push('js')
<script>
        function selects(){ 
            $('.select').addClass('d-none')
            $('.dselect').removeClass('d-none')

        var ele= $('.checkbox input');  
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=true;  
        } 

    }  
    function deSelect(){  
        $('.select').removeClass('d-none')
        $('.dselect').addClass('d-none')

        var ele=$('.checkbox input');  
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=false;  
                
        }  


  
    }  

    function default_select(){
       var defaults = @json($defaults);
        var ele=$('.checkbox input'); 
        
        
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=false;  
                
        }
        for(var i=0; i<ele.length; i++){  
           
            if(defaults.includes(parseInt(ele[i].id)))  
                ele[i].checked=true;  
                
        }


        
        
    }  
</script>
@endpush