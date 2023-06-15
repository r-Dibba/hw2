<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Diapason - Registrati </title>
    <link rel = "stylesheet" href = "{{ url('css/signup.css')}}">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <script>
      const BASE_URL = "{{ url('/') }}/";
      const CSRF = '{{ csrf_token() }}';
    </script>
    <script src = "{{url('js/signup_validation.js')}}" defer = "true"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
  </head>
  <body>
    <div id = "header-container">
      <header class = "prova test">
        <div id = "overlay"></div>
        <div id = "title-container">
          <img id = "logo" src = "images/diapason_logo.svg">
          <h1 id = "header-title">
            Diapason
          </h1>
        </div>
    
        <p id = "header-desc">
          Registrati per usufruire delle funzionalità di <em>Diapason</em><br> Interagisci con appassionati di musica da tutto il mondo!
        </p>
      </header>
    </div>
    <article>
      <p id = "other-page">
        Hai già un account?<br>
        <a href = "{{ url('login') }}">Clicca qui per accedere</a>
      </p>
      <form method = "post" name = 'signup'>
        @csrf
        <div class = "form-element">
          <label> Nome <br><input type = 'text' name = 'nome' placeholder="Nome" value = '{{ old("nome") }}'>
          
          @if (isset($status['errors']['nome']))
            @if ($status['errors']['nome'] === 'empty')
              <p class = 'error'> Inserisci il tuo Nome!</p>
            @endif
          @endif

          </label>
          <label> Cognome <br><input type = 'text' name = 'cognome' placeholder="Cognome" value = '{{ old("cognome") }}'>
          @if (isset($status['errors']['cognome']))
            @if ($status['errors']['cognome'] === 'empty')
              <p class = 'error'> Inserisci il tuo Cognome! </p>
            @endif
          @endif
        </div>
  
        <div class = "form-element">
          <label> E-mail <br><input type = 'email' name = 'email' placeholder="indirizzo@email.com" value = '{{ old("email") }}'>
          
          @if (isset($status['errors']['email']))
            @if ($status['errors']['email'] === 'empty')
              <p class = 'error'> Inserisci la tua email! </p>
            @elseif ($status['errors']['email'] === 'not valid')
              <p class = 'error'> Email non valida </p>
            @elseif ($status['errors']['email'] === 'unavailable')
              <p class = 'error'> Email già in uso </p>
            @endif
          @endif
          
          </label>

          <label> Username <br><input type = 'text' name = 'user' value = '{{ old("user") }}'>
          
          @if (isset($status['errors']['user']))
            @if ($status['errors']['user'] == 'empty')
              <p class = 'error'> Inserisci un nome utente! </p>
            @elseif ($status['errors']['user'] === 'too long')
              <p class = 'error'> L'username può essere al più di 12 caratteri! </p>
            @elseif ($status['errors']['user'] === 'unavailable')
              <p class = 'error'> Username già in uso </p>
            @endif
          @endif
          </label>

        </div>
  
        <div class = "form-element">
          <label> Password <br><input type = 'password' name = 'pwd1'></label>
          <label> Ripeti Password <br><input type = 'password' name = 'pwd2'></label>
        </div>
        <div id = "password-error">

          @if (isset($status['errors']['pwd1']))
            @if ($status['errors']['pwd1'] === 'empty')
              <p class = 'error'> Inserisci una Password! </p>
            @elseif ($status['errors']['pwd1'] === 'too short')
              <p class = 'error'> La password deve contenere almeno 10 caratteri </p>
            @elseif ($status['errors']['pwd1'] === 'not valid')
              <p class = 'error'> La password deve contenere almeno una maiuscola, una minuscola, un numero e uno fra i seguenti caratteri speciali: 
                    , . : - _ ! ? < > + ^ @ </p>
            @endif
          @elseif (isset($status['errors']['pwd2']))
              <p class = 'error'> Le Password non corrispondono! </p>
          @endif
        </div>
  
        <div id = 'submit-container'><input type = 'submit' value = 'REGISTRATI' id = 'submit'></div>
      </form>
    </article>
  </body>
</html>
