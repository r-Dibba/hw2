<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Diapason - Accedi </title>
    <link rel = "stylesheet" href = "{{ url('css/signup.css') }}">
    <link rel = "stylesheet" href = "{{ url('css/login.css') }}">
    <script>
      const BASE_URL = "{{ url('/') }}/";
      const CSRF = '{{ csrf_token() }}';
    </script>
    <script src = "{{url('js/login_validation.js')}}" defer = "true"></script>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
  </head>
  <body>
    <div id = "header-container">
      <header>
        <div id = "overlay"></div>
        <div id = "title-container">
          <img id = "logo" src = "images/diapason_logo.svg">
          <h1 id = "header-title">
            Diapason
          </h1>
        </div>
    
        <p id = "header-desc">
          Accedi per usufruire delle funzionalità di <em>Diapason</em><br> Interagisci con appassionati di musica da tutto il mondo!
        </p>
      </header>
    </div>
    <article>
      <p id = "other-page">
        Non hai un account?<br>
        <a href = "{{ url('signup') }}">Clicca qui per registrarti</a>
      </p>
      <form method = "post" name = 'login-form'>
        @csrf
        <div class = "form-element">
          <label> Username <br><input type = 'text' name = 'user' value = '{{ old("user") }}'>

          </label>
          <label> Password <br><input type = 'password' name = 'pwd' >
            @if ($status === 'empty')
              <p class = 'error'> Compila i campi! </p>
            @elseif($status === 'wrong cred')
            <p class = 'error'> Credenziali Errate </p>
            @endif
          </label>
        </div>
        <div id = 'submit-container'><input type = 'submit' value = 'ACCEDI' id = 'submit'></div>
      </form>
    </article>

  </body>
</html>
