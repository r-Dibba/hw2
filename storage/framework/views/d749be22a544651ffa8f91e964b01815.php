<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> <?php echo $__env->yieldContent('pagetitle'); ?> </title>
    <link rel = "stylesheet" href = "<?php echo e(url('css/home_header.css')); ?>">

    <meta name = "viewport" content = "width=device-width, initial-scale=1">

    <script>
      const BASE_URL = "<?php echo e(url('/')); ?>/";
      const CSRF = '<?php echo e(csrf_token()); ?>';
    </script>
    <script src = "<?php echo e(url('js/home.js')); ?>" defer = "true"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
  
    <?php echo $__env->yieldContent('head_content'); ?>

</head>
<body>
<header>
      <div id = "header-left">
        <img id = "user-img" src = "<?php echo $__env->yieldContent('userpic'); ?>" class = "currentuser-propic">
        <img id = "message-notifications" src = "<?php echo e(url('images/svgicons/msg.svg')); ?>" data-type = 'msg' >
        <img id = "content-notifications" src = "<?php echo e(url('images/svgicons/notifications.svg')); ?>" data-type = 'oth'>
        <?php echo $__env->yieldContent('search_bar'); ?>
      </div>

      
      <div id = "header-center">
        <img id = "site-logo" src = "<?php echo e(url('images/pngicons/diapason_logo_v2.png')); ?>">
        <h1 id = "header-title">Diapason</h1>
      </div>
     
      <img src = "<?php echo e(url('/images/svgicons/menu_icon.svg')); ?>" id = 'mobile-nav'>
      <nav>
        <div class = "white-key">
          <a href = "<?php echo e(url('home')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/home.png')); ?>">
            HOME
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('user_profile')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/user.png')); ?>">
            ACCOUNT
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('chat')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/chat.png')); ?>">
            CHAT
          </a>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('post')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/add.png')); ?>">
            PUBBLICA
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('events')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/events.png')); ?>">
            EVENTI
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('search_users')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/user_search.png')); ?>">
            UTENTI
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('logout')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/logout.png')); ?>">
            LOGOUT
          </a>
        </div>
      </nav>
    
    </header>
    <div id = 'mobile-modal' class = 'modal hidden'>

    <nav id = 'modal-nav'>
        <div class = "white-key">
          <a href = "<?php echo e(url('home')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/home.png')); ?>">
            HOME
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('user_profile')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/user.png')); ?>">
            ACCOUNT
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('chat')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/chat.png')); ?>">
            CHAT
          </a>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('post')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/add.png')); ?>">
            PUBBLICA
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('events')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/events.png')); ?>">
            EVENTI
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('search_users')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/user_search.png')); ?>">
            UTENTI
          </a>
          <div class = "black-key"></div>
        </div>
        <div class = "white-key">
          <a href = "<?php echo e(url('logout')); ?>" class = "nav-item">
            <img src = "<?php echo e(url('images/pngicons/logout.png')); ?>">
            LOGOUT
          </a>
        </div>
      </nav>

      <img id = 'close-mobile-navbar' src = "<?php echo e(url('images/svgicons/iconx.svg')); ?>">

</div>

<div id = "notif-modal" class = "modal hidden">
  <div id = "notif-box">
  <h1> </h1>
  <div class = 'ok-button'>Ok</div>
  </div>
</div>

<?php echo $__env->yieldContent('body'); ?>
</body>
</html><?php /**PATH /opt/lampp/htdocs/homework2/resources/views/layouts/header.blade.php ENDPATH**/ ?>