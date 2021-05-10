
                <li class="dropdown notification-list topbar-dropdown">
                  <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"
                     role="button" aria-haspopup="false" aria-expanded="false">
                      <i class="fe-bell noti-icon"></i>
                      <span class="badge badge-danger rounded-circle noti-icon-badge notification-count">{{ auth()->user()->unreadNotifications->count() }}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                      <!-- item-->
                      <div class="dropdown-item noti-title">
                          <h5 class="m-0">
                                      <span class="float-right">
                                          <a href="" class="text-dark">
                                              <small>@lang('sales.clear_all')</small>
                                          </a>
                                      </span>@lang('sales.notification')
                          </h5>
                      </div>

                      <div class="noti-scroll" data-simplebar>
                 
                          <!-- item-->

                          @forelse(auth()->user()->unreadNotifications as $notify) 
                          @if(array_key_exists('type',$notify->data))


                          @if( $notify->data['type'] == 'opportunity')
                              <a href="#" onclick="changeNotifyStatus('opportunity','{{$notify->data['opportunity_id'] ?? ''}} ','{{$notify->id}}')" class="dropdown-item notify-item">
                                  <div class="notify-icon bg-secondary">
                                        <i class="fab fa-opera"></i>
                                      </div>
                                      <p class="notify-details">{{ $notify->data['message'] ?? '' }}
                                          <small class="text-muted">{{ $notify->created_at->toFormattedDateString() }}</small>
                                      </p>
                                    </a>
                          @endif 
                          
                          

                          @if( $notify->data['type'] == 'task')
                              <a href="#" onclick="changeNotifyStatus('task','{{$notify->data['lead_task_id'] ?? ''}} ','{{$notify->id}}')" class="dropdown-item notify-item">
                                  <div class="notify-icon bg-secondary">
                                        <i class="fab fa-tumblr"></i>
                                      </div>
                                      <p class="notify-details">{{ $notify->data['message'] ?? '' }}
                                          <small class="text-muted">{{ $notify->created_at->toFormattedDateString() }}</small>
                                      </p>
                                    </a>
                          @endif 
                          @if( $notify->data['type'] == 'assign')
                              <a href="#" onclick="changeNotifyStatus('assign','{{$notify->data['opportunity_id'] ?? ''}} ','{{$notify->id}}')" class="dropdown-item notify-item">
                                  <div class="notify-icon bg-secondary">
                                        <i class="fab fa-atlassian"></i>
                                      </div>
                                      <p class="notify-details">{{ $notify->data['message'] ?? '' }}
                                          <small class="text-muted">{{ $notify->created_at->toFormattedDateString() }}</small>
                                      </p>
                                    </a>
                          @endif 

                          @if( $notify->data['type'] == 'answer')
                          <a href="#" onclick="changeNotifyStatus('answer','{{$notify->data['opportunity_id'] ?? ''}} ','{{$notify->id}}')" class="dropdown-item notify-item">
                              <div class="notify-icon bg-secondary">
                                    <i class="fab fa-atlassian"></i>
                                  </div>
                                  <p class="notify-details">{{ $notify->data['message'] ?? '' }}
                                      <small class="text-muted">{{ $notify->created_at->toFormattedDateString() }}</small>
                                  </p>
                                </a>
                      @endif
                          @if( $notify->data['type'] == 'result')
                              <a href="#" onclick="changeNotifyStatus('result','{{$notify->data['opportunity_id'] ?? ''}} ','{{$notify->id}}')" class="dropdown-item notify-item">
                                  <div class="notify-icon bg-secondary">
                                        <i class="fab fa-r-project"></i>
                                      </div>
                                      <p class="notify-details">{{ $notify->data['message'] ?? '' }}
                                          <small class="text-muted">{{ $notify->created_at->toFormattedDateString() }}</small>
                                      </p>
                                    </a>
                          @endif 
                          @if( $notify->data['type'] == 'question')
                              <a href="#" onclick="changeNotifyStatus('question','{{$notify->data['opportunity_id'] ?? ''}} ','{{$notify->id}}')" class="dropdown-item notify-item">
                                  <div class="notify-icon bg-secondary">
                                    <i class="fab fa-quora"></i> 
                                   </div>
                                      <p class="notify-details">{{ $notify->data['message'] ?? '' }}
                                          <small class="text-muted">{{ $notify->created_at->toFormattedDateString() }}</small>
                                      </p>
                                    </a>
                          @endif 

                          @endif  
                          @empty

                          @endforelse


                      </div>

                      <!-- All-->
                      <a href="{{url('notifications',request('agency'))}}"
                         class="dropdown-item text-center text-primary notify-item notify-all">
                          @lang('sales.view_all')
                          <i class="fe-arrow-right"></i>
                      </a>

                  </div>
              </li>









  @push('js')

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
{{-- <script src="{{ asset('assets/js/pusher.min.js') }}"></script> --}}
<script>
  

  Pusher.logToConsole = true;

  var pusher = new Pusher('4f78aa36330dd61dd73f', {
    cluster: 'eu',
    authEndpoint: "{{ url('sales/pusher/auth') }}",
    auth: {
      headers: {
        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    }
  });
  var id = @json(auth()->user()->id);
  const channel = pusher.subscribe('private.mychannel.'+id);

  channel.bind("my-event", function(data) {
    var now = @json(now()->toFormattedDateString());
    var html = '';

    var url =''
    var classFa = ''

    if(data.type == 'opportunity'){

      url = @json(url('sales/opportunities/'.request('agency')));
      classFa="fab fa-opera";
    }
    if(data.type == 'assign'){

      url = @json(url('sales/opportunities/'.request('agency')));
      classFa="fab fa-atlassian";
   
    }

    if(data.type == 'task'){

      url = @json(url('activity/tasks/'.request('agency')));
      classFa="fab fa-tumblr";

      }
    if(data.type == 'result'){

      url = @json(url('sales/opportunities/'.request('agency')));
      classFa="fab fa-r-project";
  

      }

    if(data.type == 'question'){

      url = @json(url('sales/opportunities/'.request('agency')));
      classFa="fab fa-quora";
 

      }
    if(data.type == 'answer'){

      url = @json(url('sales/opportunities/'.request('agency')));
      classFa="fab fa-atlassian";
 

      }




      html += '<a href="'+url+'" class="dropdown-item notify-item"><div class="notify-icon bg-secondary">\
              <i class="'+classFa+'"></i>';
      html += '</div>';
      html += '<p class="notify-details">'+data.message;
      html += '<small class="text-muted">'+now;
      html +=  '</small></p> </a>';
   
      $('.notification-count').text( parseInt($('.notification-count').text()) + 1 );
      $('.noti-scroll .simplebar-content').prepend(html);

      var src = "{{asset('audio/notification.mp3')}}";
      var audio = new Audio(src);
      audio.play();
                              

  });



</script>

<script>
    function goToLink(type, id) {
        var url = '';
        if (type == 'task') {
            url = @json(url('activity/tasks/'.request('agency')).'?id=');
            location.replace(url + id);
        }
        else if (type == 'assign') {
            url = @json(url('sales/opportunities/'.request('agency').'?id=') );
            location.replace(url + id);
        }
        else if (type == 'result') {
            sessionStorage.setItem('open-result-tab', id);
            url = @json(url('sales/opportunities/'.request('agency').'?id=') );
            location.replace(url + id);
        }
        else if (type == 'question') {
            sessionStorage.setItem('open-question-tab', id);
            url = @json(url('sales/opportunities/'.request('agency').'?id=') );
            location.replace(url + id);
        }
        else if (type == 'answer') {
            sessionStorage.setItem('open-question-tab', id);
            url = @json(url('sales/opportunities/'.request('agency').'?id=') );
            location.replace(url + id);
        }
    }


    function changeNotifyStatus(type, id, notify) {

        let _token = $('meta[name="csrf-token"]').attr('content');
        const url = @json(url('update_notification'));
        $.ajax({
            url: url,
            type: "POST",
            data: {
                notify: notify,
                _token: _token
            },
            success: function (response) {
                if (response) {
                    goToLink(type,id);
                }
            },
        });

    }
</script>
@endpush
