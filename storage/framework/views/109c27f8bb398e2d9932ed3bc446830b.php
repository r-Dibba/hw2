<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Diapason - Registrati </title>
    <link rel = "stylesheet" href = "<?php echo e(url('css/signup.css')); ?>">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <script>
      const BASE_URL = "<?php echo e(url('/')); ?>/";
      const CSRF = '<?php echo e(csrf_token()); ?>';
    </script>
    <script src = "<?php echo e(url('js/signup_validation.js')); ?>" defer = "true"></script>
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
        <a href = "<?php echo e(url('login')); ?>">Clicca qui per accedere</a>
      </p>
      <form method = "post" name = 'signup'>
        <?php echo csrf_field(); ?>
        <div class = "form-element">
          <label> Nome <br><input type = 'text' name = 'nome' placeholder="Nome" value = '<?php echo e(old("nome")); ?>'>
          
          <?php if(isset($status['errors']['nome'])): ?>
            <?php if($status['errors']['nome'] === 'empty'): ?>
              <p class = 'error'> Inserisci il tuo Nome!</p>
            <?php endif; ?>
          <?php endif; ?>

          </label>
          <label> Cognome <br><input type = 'text' name = 'cognome' placeholder="Cognome" value = '<?php echo e(old("cognome")); ?>'>
          <?php if(isset($status['errors']['cognome'])): ?>
            <?php if($status['errors']['cognome'] === 'empty'): ?>
              <p class = 'error'> Inserisci il tuo Cognome! </p>
            <?php endif; ?>
          <?php endif; ?>
        </div>
  
        <div class = "form-element">
          <label> E-mail <br><input type = 'email' name = 'email' placeholder="indirizzo@email.com" value = '<?php echo e(old("email")); ?>'>
          
          <?php if(isset($status['errors']['email'])): ?>
            <?php if($status['errors']['email'] === 'empty'): ?>
              <p class = 'error'> Inserisci la tua email! </p>
            <?php elseif($status['errors']['email'] === 'not valid'): ?>
              <p class = 'error'> Email non valida </p>
            <?php elseif($status['errors']['email'] === 'unavailable'): ?>
              <p class = 'error'> Email già in uso </p>
            <?php endif; ?>
          <?php endif; ?>
          
          </label>

          <label> Username <br><input type = 'text' name = 'user' value = '<?php echo e(old("user")); ?>'>
          
          <?php if(isset($status['errors']['user'])): ?>
            <?php if($status['errors']['user'] == 'empty'): ?>
              <p class = 'error'> Inserisci un nome utente! </p>
            <?php elseif($status['errors']['user'] === 'too long'): ?>
              <p class = 'error'> L'username può essere al più di 12 caratteri! </p>
            <?php elseif($status['errors']['user'] === 'unavailable'): ?>
              <p class = 'error'> Username già in uso </p>
            <?php endif; ?>
          <?php endif; ?>
          </label>

        </div>
  
        <div class = "form-element">
          <label> Password <br><input type = 'password' name = 'pwd1'></label>
          <label> Ripeti Password <br><input type = 'password' name = 'pwd2'></label>
        </div>
        <div id = "password-error">

          <?php if(isset($status['errors']['pwd1'])): ?>
            <?php if($status['errors']['pwd1'] === 'empty'): ?>
              <p class = 'error'> Inserisci una Password! </p>
            <?php elseif($status['errors']['pwd1'] === 'too short'): ?>
              <p class = 'error'> La password deve contenere almeno 10 caratteri </p>
            <?php elseif($status['errors']['pwd1'] === 'not valid'): ?>
              <p class = 'error'> La password deve contenere almeno una maiuscola, una minuscola, un numero e uno fra i seguenti caratteri speciali: 
                    , . : - _ ! ? < > + ^ @ </p>
            <?php endif; ?>
          <?php elseif(isset($status['errors']['pwd2'])): ?>
              <p class = 'error'> Le Password non corrispondono! </p>
          <?php endif; ?>
        </div>
  
        <div id = 'submit-container'><input type = 'submit' value = 'REGISTRATI' id = 'submit'></div>
      </form>
    </article>
  </body>
</html>
<?php /**PATH /opt/lampp/htdocs/homework2/resources/views/signup.blade.php ENDPATH**/ ?>