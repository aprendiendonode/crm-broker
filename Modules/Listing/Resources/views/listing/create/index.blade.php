@extends('layouts.master')

@section('title',trans('listing.listings'))
@section('css')

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/libs/uploader-master/dist/css/jquery.dm-uploader.min.css') }}">
    <link href="{{ asset('assets/libs/uploader-master/src/css/styles.css') }}" rel="stylesheet">
 
    <link href="{{ asset('assets/css/modals.css') }}" rel="stylesheet">


    <script src="{{ asset('assets/js/listing.js') }}"></script>
    <style>
        .toggle.android {
            border-radius: 0px;
        }

        .toggle.android .toggle-handle {
            border-radius: 0px;
        }


        .description-profile-modal
        .ck-editor__editable_inline {
                min-height: 350px;
        }
    </style>

    @endsection


@section('content')
    <div class="content p-3">
        <div class="content">

            <div class="content-page">
           
      


                   
                      
                            <!-- project card -->
                            <div class="card d-block">
                                <div class="card-body">
                                    {{-- <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="dripicons-dots-3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil mr-1"></i>Edit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete mr-1"></i>Delete</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline mr-1"></i>Invite</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app mr-1"></i>Leave</a>
                                        </div>
                                    </div> --}}


                                    <form id="add-staff-form" action="{{ route('listing.store') }}" data-parsley-validate="" autocomplete="off" method="POST" enctype="multipart/form-data">
                                        <div class="row ">
                                                @csrf
            
                                                @if($agency)
                                                <input type="hidden" name="agency_id" value="{{ $agency }}">
                                                @endif
                                                @if($business)
                                                <input type="hidden" name="business_id" value="{{ $business }}">
                                                @endif
            
            
            
                                                <div class="form-group offset-md-4 col-md-8">
                                                    <button   class="btn btn-primary" onclick="event.preventDefault();showRentDiv('sale')">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG8AAABPCAYAAADlaZtWAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpCNEVERjI4MDdDNTBFOTExOTRFMDhDQzQzQjM3ODNGNCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo3NkM1REE2NzVGNDYxMUU5ODE3NzhFMkU5Q0E2M0VCMyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3NkM1REE2NjVGNDYxMUU5ODE3NzhFMkU5Q0E2M0VCMyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkNDQzMxRTBFNUI1MUU5MTE4NjRFOTA2MEUwOTc4OUI4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI0RURGMjgwN0M1MEU5MTE5NEUwOENDNDNCMzc4M0Y0Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+cwEybgAABrVJREFUeNrsXWuMXVMUXnfuHW0Z4zUtIRhmVFUrRqtmUKZqqqi+vCX1SiVEJIgmHi3i/Yooqk2rQ0s94gc/KvEImgiSIhWPPyLaENooGoYynem91uesm95O7rnn7H3PuffsffaXfJlMzmvv85299lprP26mUCiQQ1W4mrmA+SLzYeZgrR6cc+++KsxnLpX3eB+zkXkPM1+Lhze4919Vi3tySAO4i3lrrQqQcWZTC5cxVzD39Dm+kHm/Ey95mMpcwzywwjk7mbcxH3VmMzm4lPlSgHBAlnkv86Y0tbyRzGnMg+Tr9S23/P2SuS7g3KhwoZjKfRSuged5M/OpWEoE8RLCHHNJQQ1bmT01KNtMeZYO+pnXxFGuJJnN/ZljFK/Zm3lwzOXqYT7LbNG8fg/xSufb3OcVNMxfPmaT2clcLua8GgxnPs28wmaHJUkd8JniVbZGdL9h0gLnuQxLvDiLuZJ5SMT3bWYuEYdrtQsVosfpzGUxCFfaTy9mXuDEixYTmb0Rmko/7CsfyFwnXjQ4lvk488gaPe8AiRvPs0G835k7NBycvgiefQLzFebkOoRHyyUxEZvD0sUczxyI0ctsYh6hUf5zJOuRVXDbUY+1zC3MCeSNxY2p00eLbNIq5pXMt1UuDJMeO4X5MvPQGrjzGc3r8iGvLZ6DdBUSx0dJODA2AZbnZwkj3o/KbOJrnlkiXPEFxMVqzH/Y+yPWukMyMysSIhxJeeAsTY1KPDTpGZY4JEgSP0Reohje3lLxLpOEwyW+nBKFeCcl6Mustk9dIKayjfmqyhdeBwGXiZ+hLR5M5ixLWh0Sy0+IcL1hXkydMZr5HHOSrsMCk/kV6WfTkwJ4ctcyR0mL6zSo7N8yL2FuUG153RYIt0aEK4rYaVj50QJfYHaoine54cLBIbmevGTwKvkYTQQyP6slHg0lHpyUkw12TjD59UbyhmHQ+i4y/EMcJ2HNuDDizSEv+20ikDnB3Mn9mM+TNy5nAzrE2RpbSTyknKaTmUnrN8mbUzlKKno22YUTxQsd7SdeO9Uusx4l3iEvP4jk9jPk5TxtxCQxoe3lxJsoJsckvCvC/UrebOXzyW6chg+0nHjnMkcYVBEkdBcxN8v/PZQOnJorE1dMMKwS3zM3lvx/u4iJIaadFoqGBochrddyZZpjm2GVQTYe801+kf8/YH4ulbRRvKyEQ325IYp2G+hlwrm6jnkneaPqGNv7U46NkPrYsppmt5kDpbnN45mvU/yTb+LCd8wvmL+RN+yDFnk3eVMNBi0QrmhJsIjz02JMV2oyWw2uXLtwO3lDP5jgM5u5l2Vms3dokN5sUSbiLzGdAyXm0xagTv8OFQ9f7BkWdu4Zm+tUNJuTLTQvYbGe+XVIzxQtGqm36QGxcD/zPeZPct9MCEGOIcWphxAP8zkuTqlwcHBukL8FhXf2CHnDTX6irBXH4huFssDfWKkiIAqCYYaulIqHdBpGq1Um+6Lf+VHE9hNvs3wQKsA9f1B1P2dRepHRjGszVR73C76zquLNtVCQVKBBmqtNaE6LgOjzrpIAPVum0y4Y2Or+kVivIQ3ibaTds/LOfBoknh8eEC80b1B90NqQ25xnWLkjFw/D7d0G1mkbecu4rN+Xq1K/sN3QOg2kodUFtbygPmMLVV4XVxAindQYsjwIlrdS8JIvHBupGhelSTw/oE+5hbx8YBjxMJ72GHnjhZXwEXmTh/6gcOv1DmM+yDzaiRceH5I3mVUFmK59XAUzjWEOLC1ep3BPTHXARNRFaRVPJxb6W+O6bQEORF5iM52yVBtO6MxzyQfUR8dZGlTtq3XEy2rEUNmIzonCcpSiidT3FcNQUEvAO4BJV5243EKKq7LSvn0VpkpgO6mPxVnKhGgd2DVifMB5M6RFrw/Zf+M4ply2OvHCo004LeL7wqLNESaqz3Mw2GFxcOI5OPGceA4mwu10qweEFf0+IQACdORyhzvxkgksLX7LRzxkSbBAdWESxdMZcgna6rFA6nttknz99QCC7zcqHO+rhXg6fR5m9jYpXtMV8CyknDoU7zlM45qoEFT/5qT2edgVFov3P6PgfS6RIkKOryfgPAiLnYqw/+Um2rUFYyVgKGgKpRg5zdbaSdFvBYV9X2a77tSFCk48ByeegxPPwYnnxHNw4jk48Zx4DlaJl3GvR/vdZGrx7EriNRr6YnO0a615XENe+SqPV1O3htJ//IAfc8evauHXhk1ZLoWKYaEKEuKYQr+JvKGmHRHeH8NQGwLOw3H8oBO2wByMqLVBh0/I+234//GfAAMAiVeLpoU8FfUAAAAASUVORK5CYII="
                                                        class="sc-bdVaJa sc-bZQynM eGHNJB"><div font-size="1" class="sc-bdVaJa sc-htpNat dKhyze">@lang('listing.Property for Sale')</div></button>
            
            
                                                        <button  class="btn btn-warning"   onclick="event.preventDefault();showRentDiv('rent')">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG8AAABPCAYAAADlaZtWAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OUE4ODhGQTlGNjNFMTFFOTgyQzFEMkJBRTk1NUJGNDQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OUE4ODhGQUFGNjNFMTFFOTgyQzFEMkJBRTk1NUJGNDQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo5QTg4OEZBN0Y2M0UxMUU5ODJDMUQyQkFFOTU1QkY0NCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5QTg4OEZBOEY2M0UxMUU5ODJDMUQyQkFFOTU1QkY0NCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Ps1OxK0AAAWLSURBVHja7F1NiBxFFH41O7vZNWZjNv4l/hAlEUEIiEYUDYoogl69KQFz1ouQg55EkIDgRfCgeBDBHxBBQVQU9eIlIkYUEUSjHrJL3I1xs5vdnf1r30e/ZprRmame9HRXb38ffOywVHe/qq/qVdWr6moXRZEQ1UQzp/s8pzyibCg3A83rNuWq8mXlq8qlqovncmp508o9FcnzCeUTyp/Z8mK07O+68rTyvNX0EHzyhnJSebXlFzaN0G22EaVa4PPKk8rtgYiHinWn8lnzDlHArr0U8RIsKL9V/hBYPkeVy1ttwNLI+X7jyt0B5vNy5RjF83ehISEK1K6gxIsCFk8oHkHxCIpH8QiKR1A8whfNEp89oZyyCoTIzLzHkB5pd0ocekPM8pxyhS2veDykfEP5tvJJE7MfEGB+RvmOXXuf0rHlFY8DysMSrz7MetqCENc9yrus5X1g4kVsecXiQqrQFz0FgGD/pK5ZqqtwoQ1YihIBFWCNbrOa2LT+dUdJldeZDecpXnbcpDymnJNylolQYbBA/KHyK4qXDdgO8XgAdtytPMRJejXQ2afvo9vMjhnlx8ozEq/8FwX0cfuVjyh3WWCC4mXEKeVLyt8KzD8GKcvmKu8w8TjaHHC0iZDaqrFI5DpFqWOf1xS/UNwwMJ5nmXPAUuFABMWrMCgexSMoHkHx6jRsJv6LK5TXWeXe8EiPV8bwetufEm/NoHglVuiHlU/bb6wAOI9rsDj8gvIjilceINSNyoMZr0MLvZ5us1wgfIag9WlpL5z6CI5A8xzFK1+8T0w89GWrHm4z6Ru/p3jlAiGs342cKhAUj6B4FI+geATFo3hE1RDKPC/KkC4a4LqscDLYq2OFHmVSpnhjqZY/5ukFkGab/R41DkM4xDXx+lmyWuBjF9J9ofylDuLh9Swsn2BHFTak+h7mNm/p8arXMN6KhWD3K49b+Sx7tMJRs2mhLuJ9LnEgFxn/1VMIFNCLyncljjmeHFLLG0+18Es9r0tfs+XFGyR+CMFOGIcFBJhxkOpnVrGWPFse0p2q44AlJMB9f6r8eoBB0SLFKx8rUoFTJjjP4ySdoHgExaN4BMUjKB4R4DwveUs1ayTe2TxsWCcZTUj76ydZbEJ0ZqkO4l2rPKq8WeKwV5ShkBCO+lH5uuS70RWrGziN8FGJA9RrGcsSEZb3lF9udfEelPgkou0pUXyQiIxCRkD7fclvDQ0V6inlAx2Vxdcm/MUHOL6RAkJlZYp3mT0/cTdrlnnXo4CctNf+EMWfknyPbJwwu5J7rpltro9wTfMGSIfDXCe3unit1G98f+gt68cgymaXPm7SXO0t5mpbku/K9bq0j/fAeiEOcv1O4qWeboM72IXzVR6zitUSv9fCKj9gSfCT8hXpvyCLlnGviTfsz6jNm0v2OdxtwfrJQg+iC2Wq0BS/o6TGUxVu2HtFnPgtro5YusKPSw5FPCf+e1hcYDYlaWsrHkHxKB5RU/Gy+H53kX3GoM8qu293Ibe8LMZFGTPV+B/RByk0l3OFcp4DHRdyy8OE9axn2r9T4iUbafthNhW5wER4znPKMJeafGMT7ZkeNi2nggg+eUk+i5NMzGHfX13SnpUcNzblPUnHcfe329yn16e2EXY6mJpoI6Z42P4/0qXGrto9r7T/IRx1qwnaa8IOEW6T9hmbU/as6Y78o/D3SvuDxXjWIYu6jPVoNRsdebnKAgmL0t6Oj2svmL07cnNxUZTLXBebZ/eJ30fuk++U7zYhnKWfsf83uoi3boVxjfISSztrraXRp2WkP3K/YsK1Oq6L7P57Teh1a6HzfSoH7r/LRGuYSNMdFdHZ8ybNftjxh/KGEMSDsXs4/suEGasopbvN15RHrOZtUpe+4wyU0ZsXe6N/BRgAju4p4jVEHlIAAAAASUVORK5CYII=" class="sc-bdVaJa sc-bZQynM eGHNJB">
                                                            <div font-size="1" class="sc-bdVaJa sc-htpNat bDKqpz">@lang('listing.Property for Rent')</div>
                                                        </button>
                                                        <button  class="btn btn-warning"   onclick="event.preventDefault();showRentDiv('short')">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG8AAABPCAYAAADlaZtWAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OUE4ODhGQTlGNjNFMTFFOTgyQzFEMkJBRTk1NUJGNDQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OUE4ODhGQUFGNjNFMTFFOTgyQzFEMkJBRTk1NUJGNDQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo5QTg4OEZBN0Y2M0UxMUU5ODJDMUQyQkFFOTU1QkY0NCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5QTg4OEZBOEY2M0UxMUU5ODJDMUQyQkFFOTU1QkY0NCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Ps1OxK0AAAWLSURBVHja7F1NiBxFFH41O7vZNWZjNv4l/hAlEUEIiEYUDYoogl69KQFz1ouQg55EkIDgRfCgeBDBHxBBQVQU9eIlIkYUEUSjHrJL3I1xs5vdnf1r30e/ZprRmame9HRXb38ffOywVHe/qq/qVdWr6moXRZEQ1UQzp/s8pzyibCg3A83rNuWq8mXlq8qlqovncmp508o9FcnzCeUTyp/Z8mK07O+68rTyvNX0EHzyhnJSebXlFzaN0G22EaVa4PPKk8rtgYiHinWn8lnzDlHArr0U8RIsKL9V/hBYPkeVy1ttwNLI+X7jyt0B5vNy5RjF83ehISEK1K6gxIsCFk8oHkHxCIpH8QiKR1A8whfNEp89oZyyCoTIzLzHkB5pd0ocekPM8pxyhS2veDykfEP5tvJJE7MfEGB+RvmOXXuf0rHlFY8DysMSrz7MetqCENc9yrus5X1g4kVsecXiQqrQFz0FgGD/pK5ZqqtwoQ1YihIBFWCNbrOa2LT+dUdJldeZDecpXnbcpDymnJNylolQYbBA/KHyK4qXDdgO8XgAdtytPMRJejXQ2afvo9vMjhnlx8ozEq/8FwX0cfuVjyh3WWCC4mXEKeVLyt8KzD8GKcvmKu8w8TjaHHC0iZDaqrFI5DpFqWOf1xS/UNwwMJ5nmXPAUuFABMWrMCgexSMoHkHx6jRsJv6LK5TXWeXe8EiPV8bwetufEm/NoHglVuiHlU/bb6wAOI9rsDj8gvIjilceINSNyoMZr0MLvZ5us1wgfIag9WlpL5z6CI5A8xzFK1+8T0w89GWrHm4z6Ru/p3jlAiGs342cKhAUj6B4FI+geATFo3hE1RDKPC/KkC4a4LqscDLYq2OFHmVSpnhjqZY/5ukFkGab/R41DkM4xDXx+lmyWuBjF9J9ofylDuLh9Swsn2BHFTak+h7mNm/p8arXMN6KhWD3K49b+Sx7tMJRs2mhLuJ9LnEgFxn/1VMIFNCLyncljjmeHFLLG0+18Es9r0tfs+XFGyR+CMFOGIcFBJhxkOpnVrGWPFse0p2q44AlJMB9f6r8eoBB0SLFKx8rUoFTJjjP4ySdoHgExaN4BMUjKB4R4DwveUs1ayTe2TxsWCcZTUj76ydZbEJ0ZqkO4l2rPKq8WeKwV5ShkBCO+lH5uuS70RWrGziN8FGJA9RrGcsSEZb3lF9udfEelPgkou0pUXyQiIxCRkD7fclvDQ0V6inlAx2Vxdcm/MUHOL6RAkJlZYp3mT0/cTdrlnnXo4CctNf+EMWfknyPbJwwu5J7rpltro9wTfMGSIfDXCe3unit1G98f+gt68cgymaXPm7SXO0t5mpbku/K9bq0j/fAeiEOcv1O4qWeboM72IXzVR6zitUSv9fCKj9gSfCT8hXpvyCLlnGviTfsz6jNm0v2OdxtwfrJQg+iC2Wq0BS/o6TGUxVu2HtFnPgtro5YusKPSw5FPCf+e1hcYDYlaWsrHkHxKB5RU/Gy+H53kX3GoM8qu293Ibe8LMZFGTPV+B/RByk0l3OFcp4DHRdyy8OE9axn2r9T4iUbafthNhW5wER4znPKMJeafGMT7ZkeNi2nggg+eUk+i5NMzGHfX13SnpUcNzblPUnHcfe329yn16e2EXY6mJpoI6Z42P4/0qXGrto9r7T/IRx1qwnaa8IOEW6T9hmbU/as6Y78o/D3SvuDxXjWIYu6jPVoNRsdebnKAgmL0t6Oj2svmL07cnNxUZTLXBebZ/eJ30fuk++U7zYhnKWfsf83uoi3boVxjfISSztrraXRp2WkP3K/YsK1Oq6L7P57Teh1a6HzfSoH7r/LRGuYSNMdFdHZ8ybNftjxh/KGEMSDsXs4/suEGasopbvN15RHrOZtUpe+4wyU0ZsXe6N/BRgAju4p4jVEHlIAAAAASUVORK5CYII=" class="sc-bdVaJa sc-bZQynM eGHNJB">
                                                            <div font-size="1" class="sc-bdVaJa sc-htpNat bDKqpz">@lang('listing.short time')</div>
                                                        </button>
            
                                                </div>

                                                <input type="hidden" name="purpose" value="{{ old('purpose', $has_ref ? $listing_by_ref->purpose : '' ) }}" class="purpose">
                                                <div class="form-group offset-md-3 col-md-6">
                                                    <label class="font-weight-medium text-muted" >@lang('listing.type')<span class="text-danger"> *</span></label>
                                                    
                                                        <select @if(! $has_ref) disabled @endif class="form-control select2 listing_type "
                                                         onchange="showFurnishedQuestion();"  name="type_id" data-toggle="select2" data-placeholder="@lang('listing.listing_types')" required>
                                                            <option value=""></option>
                                                                <optgroup label="@lang('listing.residential')">
                                                                    @foreach($listing_types->where('type','residential') as $type)
                                                                    <option 
                                                                    data-furnished="{{ $type->furnished_question }}"
                                                                    @if(old('type_id',$has_ref ? $listing_by_ref->type_id : '') == $type->id) selected @endif
                                                                    value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                                                    @endforeach
                                        
                                                                </optgroup>
                                                                <optgroup label="@lang('listing.commercial')">
                                                                    @foreach($listing_types->where('type','commercial') as $type)
                                                                    <option value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                                                    @endforeach
                                        
                                                                </optgroup>
                                                
                                                        </select>
                                                    
                                                </div>

                                           <div class="show-after-choosing-type row @if(! $has_ref) d-none @endif">

                                                <div class="form-group offset-md-3 col-md-6">
                                                    <div class="card-box">
                                                        <h4 class="header-title mb-3">@lang('listing.location')</h4>
                    
                                                        {{-- <div id="gmaps-markers" class="gmaps"></div> --}}
                                                        <div id="map" class="gmaps" ></div>

                                                    </div> <!-- end card-box-->
                                                </div> <!-- end col-->
                             
                                                <div class="form-group offset-md-3 col-md-6" >
                                                    <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.location')</label>
                                                    <div class="d-flex align-items-center" style="flex:2">
                                                        <input type="text" class="form-control" name="location"  id="location_input"  value="{{ old('location',$has_ref ? $listing_by_ref->location : '') }}" 
                                                         >
                                                         <input type="hidden" name="loc_lat" id="latitude" value="{{ old('loc_lat',$has_ref ? $listing_by_ref->loc_lat : '') }}" >
                                                         <input type="hidden" name="loc_lng" id="longitude" value="{{ old('loc_long',$has_ref ? $listing_by_ref->loc_lng : '') }}">
                                                     
                                                     
                                                    </div>
                                                </div>
                                
                                            

                                                <div class="form-group offset-md-3 col-md-3">

                                                    <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.city')<span class="text-danger">*</span></label>
                                                    <div style="flex:2;">
                                                        <select required onchange="getCommunitites('create',null,'{{ app()->getLocale() }}' ,'{{  route('listings.get-communities') }}' ,'{{ csrf_token() }}' )" class="form-control select2 city-in-create" name="city_id"
                                                         data-toggle="select2" data-placeholder="@lang('listing.city')">
                                                                <option value=""></option>
                                                            
                                                            @foreach($cities as $city)
                                                                <option @if(old('city_id',$has_ref ? $listing_by_ref->city_id : '') == $city->id  ) selected @endif value="{{ $city->id }}">
                                                                    {{ $city->{'name_'.app()->getLocale()} }}
                                                                </option>
                                                            @endforeach
                                    
                                                        </select>
                                                  
                                                    </div>
                                                </div>
                                
                                
                                    
                                            <div class="form-group  col-md-3">
                                
                                                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.community') <span class="text-danger">*</span></label>
                                                <div style="flex:2;">
                                                    <select required onchange="getSubCommunities('create',null,'{{ app()->getLocale() }}' ,'{{  route('listings.get-sub-communities') }}' ,'{{ csrf_token() }}')" class="form-control select2 community-in-create" name="community_id"
                                                     data-toggle="select2" data-placeholder="@lang('listing.choose_city_first')">
                                                            <option value=""></option>
                                                        
                                                      @if(old('city_id',$has_ref ? $listing_by_ref->city_id : ''))
                                                        @if(old('community_id',$has_ref ? $listing_by_ref->community_id : ''))
                                                            @foreach($communities->where('city_id',old('city_id',$has_ref ? $listing_by_ref->city_id : '')) as $community)
                                                                <option class="create-appended-communities"
                                                                    @if(old('community_id',$has_ref ? $listing_by_ref->community_id : '') == $community->id)  
                                                                        selected  
                                                                        @endif
                                                                        value="{{ $community->id }}">
                                                    
                                                                    {{ $community->{'name_'.app()->getLocale()}  }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    @endif    
                                                    
                                     
                                
                                                    </select>
                                              
                                                </div>
                                            </div>
                                
                                
                                            <div class="form-group offset-md-3 col-md-3">
                                
                                                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.sub_community')</label>
                                                <div style="flex:2;">
                                                    <select class="form-control select2 sub-community-in-create" name="sub_community_id"
                                                     data-toggle="select2" data-placeholder="@lang('listing.choose_community_first')">
                                                            <option value=""></option>
                                
                                                            @if(old('city_id',$has_ref ? $listing_by_ref->city_id : '') && old('community_id',$has_ref ? $listing_by_ref->community_id : ''))
                                                            @if(old('sub_community_id',$has_ref ? $listing_by_ref->sub_community_id : ''))
                                                                @foreach($sub_communities->where('community_id',old('community_id',$has_ref ? $listing_by_ref->community_id : '')) as $sub_community)
                                                                    <option class="create-appended-sub-communities"
                                                                        @if(old('sub_community_id',$has_ref ? $listing_by_ref->sub_community_id : '') == $sub_community->id)  
                                                                            selected  
                                                                            @endif
                                                                            value="{{ $sub_community->id }}"
                                                                    >
                                                        
                                                                        {{ $sub_community->{'name_'.app()->getLocale()}  }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endif  
                                                    </select>
                                              
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">

                                                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.views')<span class="text-danger"> *</span></label>
                                                <div style="flex:2;">
                                                    <select class="form-control select2" multiple="multiple" name="view_ids[]"
                                                     data-toggle="select2" data-placeholder="@lang('listing.views')">
                                                            <option value=""></option>
                                                        
                                                        @foreach($listing_views as $view)
                                                            <option @if(old('view_ids',$has_ref ? $listing_by_ref->view_ids : []) && in_array($view->id,old('view_ids',$has_ref ? $listing_by_ref->view_ids : []))  ) selected @endif value="{{ $view->id }}">
                                                                {{ $view->{'name_'.app()->getLocale()} }}
                                                            </option>
                                                        @endforeach
                                
                                                    </select>
                                              
                                                </div>
                                            </div>
                                   


                                            <div class="form-group offset-md-3 col-md-6">
                                                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.unit')</label>
                                                <div class="d-flex" style="flex:2">
                                                    <input type="text" class="form-control mr-2"
                                                    placeholder="@lang('listing.unit')"
                                                     name="unit_no" data-plugin="tippy" data-tippy-placement="top-start" 
                                                    title="Unit" id="unit"  value="{{ old('unit_no',$has_ref ? $listing_by_ref->unit_no : '') }}">
                                                    <input type="text" class="form-control mr-2"
                                                     data-plugin="tippy" data-tippy-placement="top-start" title="Plot" placeholder="@lang('listing.plot')"
                                                     name="plot_no" id="plot"  value="{{ old('plot_no',$has_ref ? $listing_by_ref->plot_no : '') }}">
                                                    <input type="text" data-plugin="tippy" 
                                                    placeholder="@lang('street')"
                                                    data-tippy-placement="top-start" title="Street" class="form-control"
                                                     name="street_no" id="street"  value="{{ old('street_no',$has_ref ? $listing_by_ref->street_no : '') }}">
                                                </div>
                                            </div>



                                            <div class="form-group offset-md-3 col-md-6">
                                                <label class="font-weight-medium text-muted" style="flex:1">
                                                <span id="rent-sale-label-create">
                                                    @lang('listing.price')
                                                </span>
                                                <span class="text-danger"> *</span></label>
                                                <div class="input-group mb-2" >
                                                    <input onkeyup="updatePrice()" onchange="updatePrice()" id="rent-sale-create" type="number" min="1" value="{{ old('price',$has_ref ? $listing_by_ref->price : '') }}" class="form-control decimal_convert" 
                                                           name="price" id="rent" required>
                                                    {{-- <div class="input-group-prepend">
                                                        <div class="input-group-text">AED</div>
                                                    </div> --}}
                                                </div>
                                            </div>


                                            <div class="form-group offset-md-3 col-md-3">
                                                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.annual_commission')</label>
                                                <div style="flex:3">
                                                    <div class="d-flex">
                                                        <div class="input-group mb-2 mr-sm-2" >
                                                            <input
                                                            name ="comission_percent"
                                                            onchange="updatePrice()"
                                                            onkeyup="updatePrice()"
                                                            value="{{ old('comission_percent',$has_ref ? $listing_by_ref->comission_percent : '') }}"
                                                             type="number" class="form-control"
                                                             min="1"
                                                             id="annaul-commission"
                                                           
                                                             >
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">%</div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-2" >
                                                            <input
                                                            name="comission_value"
                                                            value="{{ old('comission_value',$has_ref ? $listing_by_ref->comission_value : '') }}"
                                                             type="text" class="form-control"
                                                              id="commissionValue"
                                                               data-tippy-placement="top-start"
                                                                title=""
                                                                readonly
                                                                >
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">AED</div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                          
                                                </div>
                                            </div>
                                      
                                            <div class="form-group  col-md-3">
                                                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.deposite')</label>
                                                <div style="flex:2">
                                                    <div class="d-flex">
                                   
                                                        <div class="input-group mr-sm-2" >
                                                            <input 
                                                             name="deposite_percent"
                                                             onkeyup="updatePrice()"
                                                             onchange="updatePrice()"
                                                             value="{{ old('deposite_percent',$has_ref ? $listing_by_ref->deposite_percent : '') }}"
                                                             min="1"
                                                             type="number" class="form-control" 
                                                             id="deposit-percenatage"
                                                             >
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">%</div>
                                                            </div>
                                                        </div>
                                   
                                                        <div class="input-group" >
                                                            <input 
                                                            name="deposite_value"
                                                            value="{{ old('deposite_value',$has_ref ? $listing_by_ref->deposite_value : '') }}"
                                                            type="text" 
                                                            readonly
                                                            class="form-control" id="depositValue" >
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">AED</div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group offset-md-3  col-md-3">

                                                {{-- rent paid every month,week,day,year --}}
                                                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.rent_frequency')</label>
                                                <div class="d-flex" style="flex:2">
                                                    <select name="rent_frequency" class="form-control select2" 
                                                       name="Frequency" data-toggle="select2" data-placeholder="@lang('listing.rent_frequency')">
                                                        <option value=""></option>
                                                        <option @if(old('rent_frequency',$has_ref ? $listing_by_ref->rent_frequency : '') == 'yearly') selected @endif value="yearly">
                                                            @lang('listing.yearly')
                                                        </option>
                                                        <option @if(old('rent_frequency',$has_ref ? $listing_by_ref->rent_frequency : '') == 'monthly') selected @endif value="monthly">
                                                            @lang('listing.monthly')
                                                        </option>
                                                        <option @if(old('rent_frequency',$has_ref ? $listing_by_ref->rent_frequency : '') == 'weekly') selected @endif value="weekly">
                                                            @lang('listing.weekly')
                                                        </option>
                                                        <option @if(old('rent_frequency',$has_ref ? $listing_by_ref->rent_frequency : '') == 'daily') selected @endif value="daily">
                                                            @lang('listing.daily')
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group  col-md-3">
                                                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.cheque')</label>
                                                 <select class="form-control select2"
                                                  name="listing_rent_cheque_id" 
                                                  data-toggle="select2" data-placeholder="@lang('listing.select')">
                                                    <option value=""></option>
                                                    @foreach($cheques as $cheque)
                                                    <option
                                                    @if($cheque->id == old('listing_rent_cheque_id',$has_ref ? $listing_by_ref->listing_rent_cheque_id : '')) selected @endif
                                                     value="{{ $cheque->id }}">{{ $cheque->{'name_'.app()->getLocale()}  }}</option>
                                   
                                                    @endforeach
                                            
                                                </select>
                                            </div>
                                          
                                       

                                            <div class="form-group offset-md-3 col-md-3">
                                                <label for="" style="flex:1">@lang('listing.beds')</label>
                                                <select class="form-control select2" name="beds" data-toggle="select2" data-placeholder="select">
                                                   <option value=""></option>
                                                   <option @if(old('beds',$has_ref ? $listing_by_ref->beds : '') == 'studio') selected @endif value="studio"
                                                          >@lang('listing.studio')</option>
                                       
                                                   @for($i = 1;$i <= 20 ;$i++)
                                                     <option @if(old('beds',$has_ref ? $listing_by_ref->beds : '') == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                                   @endfor
                                               </select>
                  
                                            </div>   
                                            <div class="form-group  col-md-3">
                                                <label for="" style="flex:1">@lang('listing.baths')</label>
                                                <select class="form-control select2" name="baths" data-toggle="select2" data-placeholder="select">
                                                   <option value=""></option>
                   
                                                   @for($i = 1;$i <= 10 ;$i++)
                                                     <option @if(old('baths',$has_ref ? $listing_by_ref->baths : '') == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                                   @endfor
                                               </select>
    
                                            </div>

                                            <div class="form-group offset-md-3 col-md-3">
                                                <label for="" style="flex:1">@lang('listing.parkings')</label>
                                                <input type="text" style="flex:2"  class="form-control" name="parkings" value="{{ old('parkings',$has_ref ? $listing_by_ref->parkings : '') }}"  >
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="" style="flex:1">@lang('listing.year_built')</label>
                                                <input style="flex:2" type="text" class="form-control"  name="year_built" value="{{ old('year_built',$has_ref ? $listing_by_ref->year_built : '') }}" placeholder=""  >
                                            </div>


                                            <div class="form-group offset-md-3 col-md-3">
                                                <label for="" class="font-weight-medium text-muted">@lang('listing.plot_area')</label>
                                                <div class="input-group mb-2">
                                                    <input name="plot_area" type="number" class="form-control" value="{{ old('plot_area',$has_ref ? $listing_by_ref->plot_area : '') }}"
                                                    >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">sqft</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="font-weight-medium text-muted" for="">@lang('listing.area')
                                                    <span class="text-danger">*</span>
                                                     </label>
                                                <div class="input-group mb-2">
                                                    <input type="number" class="form-control" value="{{ old('area',$has_ref ? $listing_by_ref->area : '') }}" name="area" required>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">sqft</div>
                                                    </div>
                                                </div>
                                            </div>



                                      
                                            <div class="form-group offset-md-3 col-md-3">
                                                <label class="font-weight-medium text-muted">
                                                    @lang('listing.developer')
                                                </label>
                                       
                                                <div class="input-group">
                                                <div class="input-group-prepend w-100">
                                                        @can('manage_listing_setting')
                                                            <div 
                                                            class="input-group-text cursor-pointer"
                                                            data-toggle="modal"
                                                            data-target="#add_developer" 
                                                            onclick="event.preventDefault()" id="basic-addon1">
                                                                <i 
                                                                data-plugin="tippy" title="@lang('listing.new_developer')"
                                                                data-tippy-placement="top-start" 
                                       
                                                                class="fas fa-plus-circle"
                                                                ></i>
                                                            </div>
                                                        @endcan
                                        
                                                        <select  style="" class="form-control select_developer_id select2" name="developer_id" data-toggle="select2" data-placeholder="@lang('listing.developer')" >
                                                                <option value="" class="font-weight-medium text-muted"></option>
                                                                @foreach($developers as $developer)
                                                   
                                                                <option 
                                                                @if(old("developer_id",$has_ref ? $listing_by_ref->developer_id : '') == $developer->id) selected @endif 
                                                                 value="{{ $developer->id}}">
                                                                    {{ $developer->{'name_'.app()->getLocale()} }}
                                                                </option>
                                                               @endforeach    
                                       
                                                        </select>
                                       
                                                    </div>
                                                    </div>
                                               </div>
                                       
                                                                                                                               
                                        <div class="form-group col-md-3">
                                            <label class="font-weight-medium text-muted">
                                                @lang('listing.landlord')
                                            </label>

                                            <div class="input-group">
                                            <div class="input-group-prepend w-100">
                                                    @can('manage_listing_setting')
                                                        <div 
                                                        class="input-group-text cursor-pointer"
                                                        data-toggle="modal"
                                                        data-target="#add_landlord" 
                                                        onclick="event.preventDefault()" id="basic-addon1">
                                                            <i 
                                                            data-plugin="tippy" title="@lang('listing.new_landlord')"
                                                            data-tippy-placement="top-start" 

                                                            class="fas fa-plus-circle"
                                                            ></i>
                                                        </div>
                                                    @endcan

                                                    <select  style="" class="form-control select_landlord_id select2" name="landlord_id" data-toggle="select2" data-placeholder="@lang('listing.landlord')" >
                                                            <option value="" class="font-weight-medium text-muted"></option>
                                                            @foreach($landlords as $landlord)
                                            
                                                            <option @if(old("landlord_id",$has_ref ? $listing_by_ref->landlord_id : '') == $landlord->id) selected @endif  value="{{ $landlord->id}}">
                                                                {{ $landlord->name }}
                                                            </option>
                                                        @endforeach    

                                                    </select>

                                                </div>
                                            </div>
                                        </div>



                                                                    

                                <div class="form-group offset-md-3 col-md-3">
                                    <label class="font-weight-medium text-muted">
                                        @lang('listing.sources')
                                    </label>

                                    <div class="input-group">
                                    <div class="input-group-prepend w-100">
                                        @can('manage_listing_setting')
                                        <div 
                                        class="input-group-text cursor-pointer"
                                        data-toggle="modal"
                                        data-target="#add_source" 
                                        onclick="event.preventDefault()" id="basic-addon1">
                                            <i 
                                            data-plugin="tippy" title="@lang('sales.new_lead_source')"
                                            data-tippy-placement="top-start" 

                                        
                                            
                                            class="fas fa-plus-circle"
                                            ></i>
                                        </div>
                                        @endcan

                                            <select  style="" class="form-control select_souce_id select2" name="source_id" data-toggle="select2" data-placeholder="@lang('listing.sources')" required>
                                                    <option value="" class="font-weight-medium text-muted"></option>
                                                    @forelse($lead_sources as $source)
                                                        <option @if(old("source_id",$has_ref ? $listing_by_ref->source_id : '') == $source->id) selected @endif  value="{{ $source->id}}">
                                                            {{ $source->{'name_'.app()->getLocale()} }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                            </select>
                                    
                                    
                                
                                    
                            </div>
                            </div>
                            </div>

                                <div class="form-group col-md-3">
                                    <label for="assignTo" class="font-weight-medium text-muted">
                                        @lang('listing.assign_to')
                                    </label>
                                    <select 
                                    required
                                    class="form-control select2" name="assigned_to"
                                    data-toggle="select2" data-placeholder="select" 
                                    >
                                        <option value=""></option>
                                        @foreach($staffs as $staff)
                                        <option
                                        @if(old('assigned_to',$has_ref ? $listing_by_ref->assigned_to : '') == $staff->id) selected @endif
                                        value="{{ $staff->id }}">{{ $staff->{'name_'.app()->getLocale()} }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group  offset-md-3 col-md-3">
                                    <label for="status" class="font-weight-medium text-muted">  @lang('listing.status')</label>
                                    <select class="form-control select2" name="status" data-toggle="select2" data-placeholder="select" required>
                                        <option value=""></option>
                                        <option @if(old('status',$has_ref ? $listing_by_ref->status : 'draft') == 'draft') selected @endif value="draft" >@lang('listing.draft')</option>
                                        <option @if(old('status',$has_ref ? $listing_by_ref->status : '') == 'live') selected @endif value="live" >@lang('listing.live')</option>
                                        <option @if(old('status',$has_ref ? $listing_by_ref->status : '') == 'archive') selected @endif value="archive" >@lang('listing.archive')</option>
                                        <option @if(old('status',$has_ref ? $listing_by_ref->status : '') == 'review') selected @endif value="review" >@lang('listing.review')</option>
                                    
                                    </select>
                                </div>


                                <div class="form-group   col-md-3">
                                    <label for="lsm" class="font-weight-medium text-muted">  @lang('listing.lsm')</label>
                                    <select class="form-control select2" name="lsm" data-toggle="select2" data-placeholder="select" required>
                                      
                                        <option @if(old('lsm',$has_ref ? $listing_by_ref->lsm : '') == 'shared') selected @endif value="shared" >@lang('listing.shared')</option>
                                        <option @if(old('lsm',$has_ref ? $listing_by_ref->lsm : 'private') == 'private') selected @endif value="private" >@lang('listing.private')</option>
                                    
                                    </select>
                                </div>
                            
                                <div class="form-group form-inline d-none furnished_question offset-md-3 col-md-6" style="height: 64px;">

                                    <label for="furnished" class="font-weight-medium text-muted">  @lang('listing.furnished')</label>
                                    <select class="form-control select2" name="furnished" data-toggle="select2" data-placeholder="select" required>
                                      
                                        <option @if(old('furnished',$has_ref ? $listing_by_ref->furnished : '') == 'yes') selected @endif value="yes" >@lang('listing.furnished')</option>
                                        <option @if(old('furnished',$has_ref ? $listing_by_ref->furnished :'no') == 'no') selected @endif value="no" >@lang('listing.unfurnished')</option>
                                    
                                    </select>

                            
                            </div>

                                     
                     <div id="rent_div" class="form-group  col-md-12" @if($has_ref && $listing_by_ref->purpose != 'rent' ) style="display: none;" @endif>
                                <div class="form-group  offset-md-3 col-md-6 d-flex align-items-center">
                                    <div class="checkbox checkbox-primary d-flex align-items-center" style="height:55px">
                                        <input type="hidden" name="rented" value="no">
                                        <input
                                        @if(old('rented' ,$has_ref ? $listing_by_ref->rented : '') == 'yes') checked @endif
                                        id="rented1"
                                        name="rented"
                                        value="yes"
                                        type="checkbox" class="sub-rent-checkbox" onchange="showSubRentDiv()">
                                        <label for="rented1">
                                            @lang('listing.rented')
                                        </label>
                                    </div>
                                </div>
                              <div id="sub_rent_div" @if(old('rented',$has_ref ? $listing_by_ref->rented : 'no') == 'no') style="display:none" @endif>
                                <div class=" form-group offset-md-3 col-md-6">
                                    <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.tenant_start_date') <i data-plugin="tippy" data-tippy-placement="top-start" title="Tenancy Description" class="fas fa-info-circle"></i></label>
                                    <div style="flex:2">
                                        <div class="d-flex">
                                            <div class="input-group mr-sm-2">
                                            <input
                                            type="text"
                                            value="{{ old('tenancy_contract_start_date',$has_ref ? $listing_by_ref->tenancy_contract_start_date : '') }}"
                                            name="tenancy_contract_start_date"
                                            id="basic-datepicker-1" class="form-control p-1 flatpicker" >
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>
                                <div class="form-group offset-md-3    col-md-6">
                                    <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.tenant_end_date') <i data-plugin="tippy" data-tippy-placement="top-start" title="Tenancy Description" class="fas fa-info-circle"></i></label>
                                    <div style="flex:2">
                                        <div class="d-flex">
                                            <div class="input-group mr-sm-2">
                                            <input
                                            type="text"
                                            value="{{ old('tenancy_contract_end_date',$has_ref ? $listing_by_ref->tenancy_contract_end_date : '') }}"
                                            name="tenancy_contract_end_date"
                                            
                                            id="basic-datepicker-1"
                                            class="form-control p-1 flatpicker" >

                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="form-group offset-md-3 col-md-6">
                                    <label class="font-weight-medium text-muted">
                                        @lang('listing.tenant')
                                    </label>
                        
                                    <div class="input-group">
                                    <div class="input-group-prepend w-100">
                                            @can('manage_listing_setting')
                                                <div 
                                                class="input-group-text cursor-pointer"
                                                data-toggle="modal"
                                                data-target="#add_tenant" 
                                                onclick="event.preventDefault()" id="basic-addon1">
                                                    <i 
                                                    data-plugin="tippy" title="@lang('listing.new_tenant')"
                                                    data-tippy-placement="top-start" 

                                                    class="fas fa-plus-circle"
                                                    ></i>
                                                </div>
                                            @endcan
                            
                                            <select  style="" class="form-control select_tenant_id select2" name="tenant_id" data-toggle="select2" data-placeholder="@lang('listing.tenant')" >
                                                    <option value="" class="font-weight-medium text-muted"></option>
                                                    @foreach($tenants as $tenant)
                                    
                                                    <option @if(old("tenant_id",$has_ref ? $listing_by_ref->tenant_id : '') == $tenant->id) selected @endif  value="{{ $tenant->id}}">
                                                        {{ $tenant->name }}
                                                    </option>
                                                @endforeach    

                                            </select>

                                            </div>
                                            </div>
                                    </div>


                                    <div class="form-group offset-md-3 col-md-3 mb-4">
                                        {{-- <button onclick="event.preventDefault()"  class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1" data-toggle="modal" data-target="#cheques-modal">Add Cheque</button> --}}
                                        <button
                                        onclick="event.preventDefault()" data-toggle="modal"
                                        data-target="#cheque-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                                            <i class="fas fa-plus"></i>
                                            <span>
                                                @lang('listing.add_cheque')
                                            </span>
                                        </button>
                                    </div>
                        </div>
                    </div>





                                            <div class="form-group offset-md-3 col-md-6">
                                                <div class="d-flex justify-content-between align-items-end" style="height:65px">
                                                    <div>
                                                        <button onclick="event.preventDefault()" data-toggle="modal" data-target="#featuresModal" class="btn btn-outline-dark btn-sm px-1">
                                                            <i class="fas fa-plus"></i>
                                                            <span>
                                                                @lang('listing.listing_feature_single')
                                                            </span>
                                                        </button>
                                                        <button onclick="event.preventDefault()" data-toggle="modal" data-target="#extraInfo-modal" data-toggle="modal" data-target="#extraInfo" class="btn btn-outline-dark btn-sm px-1">
                                                            <i class="fas fa-plus"></i>
                                                            <span>
                                                               @lang('listing.extra_info')
                                   
                                                               
                                                            </span>
                                                        </button>
                                               
                               
                                                        <button onclick="event.preventDefault()" data-toggle="modal" data-target="#portals-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 ">
                                                            <i class="fas fa-plus"></i>
                                                            <span>
                                                                @lang('listing.portals_single')
                                                            </span>
                                                        </button>
                                                        <button onclick="event.preventDefault()" data-toggle="modal" data-target="#photos-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 ">
                                                            <i class="fas fa-plus"></i>
                                                            <span>
                                                                @lang('listing.photos_single')
                               
                                                            </span>
                                                        </button>
                                                        <button onclick="event.preventDefault()" data-toggle="modal" data-target="#videos-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 ">
                                                            <i class="fas fa-plus"></i>
                                                            <span>
                                                                @lang('listing.videos_single')
                               
                                                            </span>
                                                        </button>
                                                        <button onclick="event.preventDefault()" data-toggle="modal" data-target="#floorPlans-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 ">
                                                            <i class="fas fa-plus"></i>
                                                            <span>
                                                                @lang('listing.floor_plans_single')
                                                            </span>
                                                        </button>
                                                        <button onclick="event.preventDefault()" data-toggle="modal" data-target="#documents-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 ">
                                                            <i class="fas fa-plus"></i>
                                                            <span>
                                                                @lang('listing.documents_single')
                                                            </span>
                                                        </button>
                                                        </div>
                                               
                                                </div>
                                            </div>



                                            <div class="form-group offset-md-3 col-md-6">
                                                <label class="font-weight-medium text-muted" for="">@lang('listing.title')
                                                             
                                                </label>
                                               <input type="text" class="form-control" value="{{ old('title',$has_ref ? $listing_by_ref->title : '') }}" 
                                               name="title" >
                                      
                                            </div>
                                            <div class="form-group offset-md-3 col-md-6">
                                                <label class="font-weight-medium text-muted" for="">@lang('listing.localized_title')
                                                             
                                                </label>
                                               <input type="text" class="form-control" value="{{ old('title', $has_ref ? $listing_by_ref->title_localized : '') }}" 
                                                 name="title_localized" >
                                      
                                            </div>
                               
                                            <div class="form-group  offset-md-3 col-md-6">
                                                    <label class="font-weight-medium text-muted">@lang('listing.description')</label>
                                                    <div class="" >
                                                        <div class="description_en-1" onclick="handleDescModal()">
                                                            <textarea class="form-control"
                                                             id="description_en-1" >@lang('listing.click_to_view_description')</textarea>
                                                        </div>    
                                                
                                                        <div>
                                                        </div>
                                          
                               
                                                </div>
                                            </div>
                               
                                   
                                  

                                            
                                


                       
                                    <div class="form-group  offset-md-3 col-md-6">
                                        <label for="note" class="font-weight-medium text-muted">@lang('listing.note')</label>
                                        <textarea
                                        
                                        class="form-control"
                                        name="note" id="noteTextArea1"
                                        cols="3" rows="3">{{ old('note',$has_ref ? $listing_by_ref->note : '') }}</textarea>
                                    </div>



                                    <div class="form-group offset-md-3 col-md-6">
                                        <div class="checkbox checkbox-primary mb-2">
                                            <input type="hidden" name="never_lived_in" value="no">
                                            <input 
                                            @if(old('never_lived_in',$has_ref ? $listing_by_ref->never_lived_in : '') == 'yes') checked @endif
                                            id="neverLivedIn"  type="checkbox" name="never_lived_in" value="yes">
                                            <label for="neverLivedIn">
                                               @lang('listing.never_lived_in') 
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary mb-2">
                                            <input  value="no" type="hidden" name="featured_on_company_website">
                                            <input
                                            value='yes'
                                            @if(old('featured_on_company_website',$has_ref ? $listing_by_ref->featured_on_company_website : '') == 'yes') checked @endif
                                             id="featuredOnCompanywebsite" type="checkbox" name="featured_on_company_website">
                                            <label for="featuredOnCompanywebsite">
                                                @lang('listing.featured_on_company_website')
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary mb-2">
                                            <input  type="hidden" name="exclusive_rights" value="no"> 
                                            <input id="exclusiveRights" name="exclusive_rights" type="checkbox" @if(old('exclusive_rights',$has_ref ? $listing_by_ref->exclusive_rights : '') == 'yes') checked @endif
                                             value="yes"
                                             >
                                            <label for="exclusiveRights">
                                               @lang('listing.exclusive_rights')
                                            </label>
                                        </div>
                                    </div>

                       


    
    
{{-- 

                                    <div class="form-group">
                                        <label class="font-weight-medium text-muted" for="">@lang('listing.transaction')</label>
                                        <input 
                                          type="text" class="form-control" value="{{ old('permit_no') }}" 
                                          name="permit_no"
                                         >
                                     
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="rera_property_no_status" value="{{ old('rera_property_no_status','invalid') }}">
                                        <input type="hidden" name="rera_property_no_log" value={{ old('rera_property_no_log',1) }}>
                                        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.permit')</label>
                                        <div class="d-flex">
                                            <div class="input-group mr-sm-2" >
                                                <input
                                                value="{{ old('rera_property_no') }}"
                                                 type="text" class="form-control" name="rera_property_no" id="permit2" 
                                                 >
                                                <div class="input-group-prepend" >
                                
                                                    <div class="input-group-text"
                                                     data-plugin="tippy" data-tippy-placement="top-start" title="Validate">
                                                        <i class="fas fa-sync-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <input
                                            value="{{ old('rera_property_expiry_date') }}"
                                            name="rera_property_expiry_date"
                                             type="text" class="form-control" name="permitPolicy1" id="permitPolicy1" placeholder="@lang('listing.permit_expiry')">
                                        </div>
                                    </div>
                                     --}}


                                    <script>
                                        function handleDescModal() {
                                            $('#description-modal').modal('show');
                                        }
                                    </script>
         
                                </div>        
                        </div> <!-- end card-body-->
                                                    
                 

                                
                        @include('listing::listing.modals.create_modals') 
                             
                        <div class="div">
                            <div class="d-none justify-content-center @if(! $has_ref) show-submit-after-choosing-type  @endif">

                        
                                <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
                                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.submit')
                                </button>
                            </div>
                        </div>

                   </div>





                          

              </form>
                 
                       

             

                   
            
        </div>
        <a href="{{ url()->previous() }}"  type="button" class="btn  btn-primary waves-effect waves-light">
            @lang('listing.back')
            </a>   
    </div>
</div>

@include('listing::listing.settings_modals') 

    

@endsection


@push('js')



<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>


<script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>

<script src="{{ asset('assets/libs/gmaps/gmaps.min.js') }}"></script>
<script src="{{ asset('assets/libs/uploader-master/dist/js/jquery.dm-uploader.min.js') }}"></script>
<script src="{{ asset('assets/libs/uploader-master/src/js/demo-ui.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

{{-- <script src="{{ asset('assets/js/pages/google-maps.init.js') }}"></script> --}}

<script>

var formatter = new Intl.NumberFormat('en-EG', {
//   style: 'currency',
//   currency: 'EGP',
});
function updatePrice() {
    let price = +document.getElementById('rent-sale-create').value;
    let annualCommissionPercentage = +(document.getElementById('annaul-commission').value) / 100;
    let depositPercenatage = +(document.getElementById('deposit-percenatage').value) / 100;
    
    document.getElementById('commissionValue').value = formatter.format(annualCommissionPercentage * price);
    document.getElementById('depositValue').value = formatter.format(depositPercenatage * price);
}


   $(document).ready(function () {
    ClassicEditor
                    .create(document.querySelector('#description_en'))
                    .then()
                    .catch(error => {

                    });

                ClassicEditor
                    .create(document.querySelector('#description_ar'), {
                        language: 'ar'
                    })
                    .then()
                    .catch(error => {

                    });

        $('.select2').select2();
        $('.select2-multiple').select2();
        $(".basic-datepicker").flatpickr();
        $(".clockpicker").clockpicker({
            twelvehour :false
        });
         var agency_region = @json($agency_region);
         var agency_language = @json($agency_language);
         
        injectGoogleMapsApiScript({
                    key       : 'AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU',
                    libraries : 'places',
                    language  : agency_language,
                    region    : agency_region,
                    callback  : 'initMap',
                });



});

var formatter = new Intl.NumberFormat('en-EG', {
//   style: 'currency',
//   currency: 'EGP',
});



function showRentDiv(type) {

    $('.listing_type').prop('disabled', '');
    $('.purpose').val(type)
    if(type == 'rent'){
        $('#rent_div')[0].style.display = "block";
        document.getElementById('rent-sale-label-create').innerHTML = "Rent";
    }else {
        $('#rent_div')[0].style.display = "none";
        document.getElementById('rent-sale-label-create').innerHTML = "Sale";

    }
}
function showSubRentDiv() {
 
    if($('.sub-rent-checkbox')[0].checked){
        $('#sub_rent_div')[0].style.display = "block";
    }else {
        $('#sub_rent_div')[0].style.display = "none";
    }
        
}

function showFurnishedQuestion(){

    $('.show-after-choosing-type').removeClass('d-none');
    $('.show-submit-after-choosing-type').removeClass('d-none').addClass('d-flex');
 
    question_status = $('.listing_type').find(':selected').data('furnished');
    if(question_status == 'yes'){
        $('.furnished_question').removeClass('d-none');
    }else{
        $('.furnished_question').addClass('d-none');
    }
  
}
</script>


<script>
    var googleMapsScriptIsInjected;
 
     function injectGoogleMapsApiScript(options){

        if(googleMapsScriptIsInjected){
            return;
        }
            const optionsQuery = Object.keys(options)
                .map(k => `${encodeURIComponent(k)}=${encodeURIComponent(options[k])}`)
                .join('&');

            const url = `https://maps.googleapis.com/maps/api/js?${optionsQuery}`;

            const script = document.createElement('script');

            script.setAttribute('src', url);
            script.setAttribute('async', '');
            script.setAttribute('defer', '');
           

            document.head.appendChild(script);

            googleMapsScriptIsInjected = true;
        };



    var region = @json($agency_region);
    var agency_lat = @json($agency_lat);
    var agency_lng = @json($agency_lng);
        function initMap() {

           
            autocompletelocation_input = new google.maps.places.Autocomplete((document.getElementById('location_input')), {
                types: ["establishment"],
                });
                autocompletelocation_input.setComponentRestrictions({
                country: [region],
            });

       google.maps.event.addListener(autocompletelocation_input, 'place_changed', function () {
            var place = autocompletelocation_input.getPlace();
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
     
    
        });


        var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: parseInt(agency_lat), lng: parseInt(agency_lng) },
                zoom: 7,
                
                mapTypeId: 'roadmap'
            }); 


    

            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log( results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#location_input").val(results[0].formatted_address);
                        }
                    }
                });
            });


            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }
        
            var markers = [];
          

        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function splitLatLng(latLng){
            var newString = latLng.substring(0, latLng.length-1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng  = trainindIdArray[1];
            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }



   


</script>


<script>

    
function removePhoto(input,table){
    var id         = input.id
    var sliced_id  = id.slice(7);
    var  photo_id = $('#'+sliced_id+' .photo-id').val();
    $.ajax({
        url:'{{  route("listings.remove-listing-temporary") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id    : photo_id,
            type  : 'photo',
            table : table

        },
        success: function(data){

            $('#'+sliced_id).remove();

        },
        error: function(error){

        },
    })

}


function removeDocument(input,table){

            var id         = input.id
            var sliced_id  = id.slice(7);
            var  document_id = $('#'+sliced_id+' .document-id').val();
            $.ajax({
                url:'{{  route("listings.remove-listing-temporary") }}',
                type:'POST',
                data:{
                    _token: '{{ csrf_token() }}',
                    id    : document_id,
                    type  : 'document',
                    table : table

                },
                success: function(data){

                    $('#'+sliced_id).remove();

                },
                error: function(error){

                },
            })

}


function removePlan(input,table){
            var id         = input.id
            var sliced_id  = id.slice(7);
            var  plan_id = $('#'+sliced_id+' .plan-id').val();
            $.ajax({
                url:'{{  route("listings.remove-listing-temporary") }}',
                type:'POST',
                data:{
                    _token: '{{ csrf_token() }}',
                    id    : plan_id,
                    type : 'plan',
                    table : table

                },
                success: function(data){

                    $('#'+sliced_id).remove();

                },
                error: function(error){

                },
            })

}


function modifyName(id,table,type){

    var title = $('#rename_' + id.id).val();

    if(title === ''){
        return;
    }
    $.ajax({
        url:'{{  route("listings.modify-listing-title") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id    : id.id,
            title : title,
            table : table,
            type  : type
        },
        success: function(data){
        $('#rename_' + id.id).val('');
        $('#title_' + id.id).text(title);
        $('#save_success_' + id.id).text(data.message);
        $('#save_success_' + id.id).removeClass('d-none');
        setTimeout(function () {
            $('#save_success_' + id.id).addClass('d-none');
        },2000)

        },
        error: function(error){

        },
    })
}

function togglePlanWatermark(input,table){
        var id         = input.id
        var sliced_id  = id.slice(10);
        var  plan_id = $('#'+sliced_id+' .plan-id').val();


    $.ajax({
        url:'{{  route("listings.update-listing-temporary-active") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id    : plan_id,
            type : 'plan',
            table : table

        },
        success: function(data){

            $('#'+sliced_id+' .plan-with-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .plan-no-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .plan-with-enlarg-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .plan-no-enlarg-watermark').toggleClass('d-none')



        },
        error: function(error){

        },
    })


}

function toggleWatermark(input,table){

    var id         = input.id
    var sliced_id  = id.slice(10);
    var  photo_id = $('#'+sliced_id+' .photo-id').val();


 $.ajax({
        url:'{{  route("listings.update-listing-temporary-active") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id    : photo_id,
            type:'photo',
            table:table

        },
        success: function(data){

            $('#'+sliced_id+' .with-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .no-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .with-enlarg-watermark').toggleClass('d-none')
            $('#'+sliced_id+' .no-enlarg-watermark').toggleClass('d-none')



        },
        error: function(error){

        },
    })

    }



    
function updateMain(input,table,listing_id){
 
    // checked-main-uploaderFile89ljjtz9nx check box
    // 89ljjtz9nx  select

    var id         = input.id
    var sliced_id  = id.slice(13);

    var slicedForListingCategory = sliced_id.slice(12);

    if($('#listing-category-'+slicedForListingCategory).val() == ''){
        toast("Please Select a Category First",'error')
        $('#'+input.id).prop('checked',false);
        return false; 
    }
    if($('#listing-category-'+slicedForListingCategory).find(':selected').data('allowed') == 'no'){
        toast("This Category Not Allowed To be Main Photo",'error')
        $('#'+input.id).prop('checked',false);
        return false;
    }

  
     $(' .checked_main').prop('checked',false);

     $('.checked_main_hidden').val('no');

     $('#'+input.id).prop('checked',true);

     $('#'+input.id+'-hidden').val('yes');
     var  photo_id = $('#'+sliced_id+' .photo-id').val();
     if(table == 'main'){
        

         $.ajax({
        url:'{{  route("listings.update-listing-main-photo") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id    : photo_id,
            listing_id :listing_id
       

        },
        success: function(data){

        },
        error: function(error){

        },
    })
     }

    }


   function updateListingCategory(input,table){

    var id         = input.id
    var sliced_id  = id.slice(17);
    var  photo_id = $('#uploaderFile'+sliced_id+' .photo-id').val();


    var category_id = $('#'+input.id).val()

 

        $.ajax({
        url:'{{  route("listings.update-listing-temporary-category") }}',
        type:'POST',
        data:{
            _token: '{{ csrf_token() }}',
            id          : photo_id,
            category_id : category_id,
            table : table
       
        },
        success: function(data){

            toast(data.message,'success')
        },
        error: function(error){

        },
    })

        
    }

    function handleCloseModal(listing) {
      

  let isAllSelected = ![...document.querySelectorAll('.listing-category-'+listing)].some(el => el.value == '' );

  if(isAllSelected) {
    $('#photos-modal_'+listing).modal('toggle');
  }else {

    swal("Done!", 'please select all categories', "error");

    //   toast('please select all categories','error');

  }
  
}


    function toggle_desc() {
        type = $('.description').prop('checked');
        if (type == true) {
            //english
            $('.description_en').removeClass('d-none');
            $('.description_ar').addClass('d-none');
            $('.en-button').removeClass('d-none');
            $('.ar-button').addClass('d-none');

            $('.profile-en').removeClass('d-none');
            $('.profile-ar').addClass('d-none');
            $('.features_copy_en').removeClass('d-none');
            $('.features_copy_ar').addClass('d-none');
            $('.templates-en').removeClass('d-none');
            $('.templates-ar').addClass('d-none');
        } else {
            $('.description_en').addClass('d-none');
            $('.description_ar').removeClass('d-none');
            $('.ar-button').removeClass('d-none');
            $('.en-button').addClass('d-none');

            $('.profile-ar').removeClass('d-none');
            $('.profile-en').addClass('d-none');
            $('.features_copy_ar').removeClass('d-none');
            $('.features_copy_en').addClass('d-none');

            $('.templates-ar').removeClass('d-none');
            $('.templates-en').addClass('d-none');


        }
    }


</script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXmcaeAp18vaypkcvsxt5qZcgFlXjeKnU&libraries=places&language=ar&region=EG&callback=initMap"></script> --}}

@endpush