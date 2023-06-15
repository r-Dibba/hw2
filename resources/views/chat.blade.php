
@extends('layouts.header')

@section('pagetitle', 'Diapason - Chat')

@section('head_content')
    <link rel = "stylesheet" href = "{{url('css/search_results.css')}}">
    <link rel = "stylesheet" href = "{{url('css/user_profile.css')}}">
    <link rel = "stylesheet" href = "{{url('css/chat.css')}}">
    <script src = "js/search_users.js" defer = "true"></script>
    <script src = "js/user_profile.js" defer = "true"></script>
    <script src = "js/chat.js" defer = "true"></script>

    
@endsection

@section('userpic', $user['propic'])

@section('body')
    <h2 id = 'page-info'>

      

      Chatta con gli utenti di <em>Diapason</em>     
      

    </h2>

    <article>
      <section id = "show-chat">

      <div id = "friend-search">
        <form name = "chat-search" method = "get" >
          <input type = 'text' name = 'user-search' placeholder = 'cerca utenti' id = 'search-box' autocomplete = "off">
          <input type = 'submit' value = '' id = 'search-submit'>
        </form>
        <div id = 'filters'>
          <p class = 'flw-info' data-flw-info = 'followed-by-chat'>
            Follower
          </p>
          <p class = 'flw-info' data-flw-info = 'follows-chat'>
            Seguiti
          </p>
          <p class = 'flw-info' data-flw-info = 'unread'>
            Non Letti
          </p>
        </div>

      <div id = "friend-list">
      </div>
        
      </div>

      <div id = chatbox>
        <h2></h2>
        <div id = "conversation">
        </div>

        <form name = 'sendmsg'>
          <input type = "text" name = "message" placeholder = "scrivi..." class = "user-searchbox" autocomplete = 'off'>
          <input type = 'hidden' name = 'target-user'>
          <input type = 'submit' name = 'send' value = '' class = "searchbox-send">
        </form>
      </div>
        

      </section>
      <section id = 'fullinbox-modal' class = 'hidden modal'>
        <div id = 'in-modal'>
          <h1>Rallenta!</h1>
          <p>Sembra che <span></span> sia impegnato al momento.</p>
          <p>Aspetta che visualizzi i messaggi prima di inviarne altri!</p>

          <div class = 'ok-button'>Ok</div> 
        </div>
      </section>

    </article>
@endsection