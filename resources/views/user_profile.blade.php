@extends('layouts.header')

@section('pagetitle', 'Account - '.$clicked_profile['username'])

@section('head_content')
  <link rel = "stylesheet" href = "{{ url('css/search_results.css')}}">
    <link rel = "stylesheet" href = "{{ url('css/search_posts.css')}}">
    <link rel = "stylesheet" href = "{{ url('css/user_profile.css')}}">

    <script src = "{{url('js/search_users.js')}}" defer = "true"></script>
    <script src = "{{url('js/chat.js')}}" defer = "true"></script>
    <script src = "{{url('js/user_profile.js')}}" defer = "true"></script>
    <script src = "{{url('js/search_posts.js')}}" defer = "true"></script>
@endsection

@section('userpic', $user['propic'])

@section('body')
    <article>
        <div id = "user-banner" >
            <div class = "banner-row">

                <div id = "banner-left">
                    <img src = "{{ url($clicked_profile['propic']) }}" class = 'currentuser-propic'><br>
                    <p id = "rank">
                        Rank: <br>
                        <em> {{ $clicked_profile['rank'] }}</em>
                    </p>
                </div>

                <div id = "banner-right">
                    <p id = "motto">
                      "{{ $clicked_profile['motto'] }}"
                    </p>
                    <h6>
                     ~{{ $clicked_profile['username'] }}
                    </h6>
                </div>

            </div>

            <div class = "banner-row">
                <div id = "bottom-left">
                    

                    @if ($user['current_user'] != $clicked_profile['username'])
                      <img src = "{{url('images/svgicons/chat.svg')}}" id = 'banner-quick-msg'>

                      <img src = "{{url('images/svgicons/add_user.svg')}}" data-user = "{{ $clicked_profile['username']}}" id = 'banner-add-friend'>
                    @else
                      <img src = "{{url('images/svgicons/settings.svg')}}" id = 'acc-settings'>
                    @endif


                  
                </div>

                <div id = "bottom-center">
                    <p class = "flw-info" data-flw-info = 'followed-by'>
                        Follower
                        <span>{{  $clicked_profile['amt_followedby'] }}</span>
                  </p>

                    <p class = "flw-info" data-flw-info = 'follows'>
                        Seguiti
                        <span>{{ $clicked_profile['amt_follows'] }}</span>
                  </p>
                </div>

                <div id = "bottom-right">
                    <p id = "show-post">
                        Mostra Post
                    </p>
                </div>
            </div>
        </div>

        <h2 id = "search-info">
        </h2>
      
      <section>
      
      </section>
      
      @if ($user['current_user'] != $clicked_profile['username'])
        <section id = 'send-msg-modal' class = 'modal hidden'>
        <div id = 'in-modal' class = 'quick-msg'>
        <h1>Invia un Messaggio!</h1>
        <form name = 'sendmsg'>
          <input type = 'text' name = 'message' placeholder = 'scrivi' class = 'user-searchbox' autocomplete = 'off'>
          <input type = 'hidden' name = 'target-user' value = "{{ $clicked_profile['username']}}">
          <input type = 'submit' name = 'send' value = '' class = 'searchbox-send'>
        </form>
        <p>
        </p>
        <div class = 'ok-button hidden'>
          Chiudi
        </div>
        </div>
      </section>
      
      
      @else
        <section id = 'acc-upd-modal' class = 'modal hidden'>
        <div id = 'in-modal' class = 'acc-settings'>
        <h1>Aggiorna Profilo</h1>
        <div id = 'forms-container'>
        <form name = 'form-propic' enctype = 'multipart/form-data' method = 'post'>
          <label> Aggiorna Immagine <img src = "{{ url($user['propic']) }}" class = 'currentuser-propic'><input type = 'file' name = 'propic' class = 'hidden'></label>
          <input type = 'submit' name = 'send' value = 'aggiorna'>
        </form>
        <form name = 'form-motto' id = 'form-motto' method = 'post'>
          <label> Aggiorna Motto <textarea name = 'upd-motto' placeholder = "{{ $clicked_profile['motto'] }}"></textarea> </label>
          <input type = 'submit' name = 'send' value = 'aggiorna'>
        </form>
        </div>
          
        <div id = 'upd-errors'>
        <p></p>
        <p></p>
        </div>
        
        <div class = 'ok-button'>
          Chiudi
        </div>
        </div>
      </section>
      @endif    
    </article>
@endsection
