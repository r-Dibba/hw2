<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> @yield('pagetitle') </title>
    <link rel = "stylesheet" href = "{{ url('css/home_header.css')}}">

    <meta name = "viewport" content = "width=device-width, initial-scale=1">

    <script>
      const BASE_URL = "{{ url('/') }}/";
      const CSRF = '{{ csrf_token() }}';
    </script>
    <script src = "{{ url('js/home.js')}}" defer = "true"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
  
    @yield('head_content')

</head>
<body>
<header>
      <div id = "header-left">
        <img id = "user-img" src = "@yield('userpic')" class = "currentuser-propic">
        <img id = "message-notifications" src = "{{url('images/svgicons/msg.svg')}}" data-type = 'msg' >
        <img id = "content-notifications" src = "{{url('images/svgicons/notifications.svg')}}" data-type = 'oth'>
        @yield('search_bar')
      </div>

      
      <div id = "header-center">
        <img id = "site-logo" src = "{{url('images/pngicons/diapason_logo_v2.png')}}">
        <h1 id = "header-title">Diapason</h1>
      </div>
     
      <img src = "{{url('/images/svgicons/menu_icon.svg')}}" id = 'mobile-nav'>
      <nav>
        <div class = "white-key">
          <a href = "{{ url('home') }}" class = "nav-item">
            <img src = "{{ url('images/pngicons/home.png')}}">
            HOME
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{ url('user_profile') }}" class = "nav-item">
            <img src = "{{url('images/pngicons/user.png')}}">
            ACCOUNT
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{ url('chat') }}" class = "nav-item">
            <img src = "{{url('images/pngicons/chat.png')}}">
            CHAT
          </a>
        </div>
        <div class = "white-key">
          <a href = "{{ url('post') }}" class = "nav-item">
            <img src = "{{url('images/pngicons/add.png')}}">
            PUBBLICA
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{ url('events') }}" class = "nav-item">
            <img src = "{{url('images/pngicons/events.png')}}">
            EVENTI
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{  url('search_users')  }}" class = "nav-item">
            <img src = "{{url('images/pngicons/user_search.png')}}">
            UTENTI
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{  url('logout')  }}" class = "nav-item">
            <img src = "{{url('images/pngicons/logout.png')}}">
            LOGOUT
          </a>
        </div>
      </nav>
    
    </header>
    <div id = 'mobile-modal' class = 'modal hidden'>

    <nav id = 'modal-nav'>
        <div class = "white-key">
          <a href = "{{ url('home') }}" class = "nav-item">
            <img src = "{{ url('images/pngicons/home.png')}}">
            HOME
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{ url('user_profile') }}" class = "nav-item">
            <img src = "{{url('images/pngicons/user.png')}}">
            ACCOUNT
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{ url('chat') }}" class = "nav-item">
            <img src = "{{url('images/pngicons/chat.png')}}">
            CHAT
          </a>
        </div>
        <div class = "white-key">
          <a href = "{{ url('post') }}" class = "nav-item">
            <img src = "{{url('images/pngicons/add.png')}}">
            PUBBLICA
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{ url('events') }}" class = "nav-item">
            <img src = "{{url('images/pngicons/events.png')}}">
            EVENTI
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{  url('search_users')  }}" class = "nav-item">
            <img src = "{{url('images/pngicons/user_search.png')}}">
            UTENTI
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "{{  url('logout')  }}" class = "nav-item">
            <img src = "{{url('images/pngicons/logout.png')}}">
            LOGOUT
          </a>
        </div>
      </nav>

      <img id = 'close-mobile-navbar' src = "{{url('images/svgicons/iconx.svg')}}">

</div>

<div id = "notif-modal" class = "modal hidden">
  <div id = "notif-box">
  <h1> </h1>
  <div class = 'ok-button'>Ok</div>
  </div>
</div>

@yield('body')
</body>
</html>