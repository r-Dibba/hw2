<?php $__env->startSection('pagetitle', 'Diapason - Chat'); ?>

<?php $__env->startSection('head_content'); ?>
    <link rel = "stylesheet" href = "<?php echo e(url('css/search_results.css')); ?>">
    <link rel = "stylesheet" href = "<?php echo e(url('css/user_profile.css')); ?>">
    <link rel = "stylesheet" href = "<?php echo e(url('css/chat.css')); ?>">
    <script src = "js/search_users.js" defer = "true"></script>
    <script src = "js/user_profile.js" defer = "true"></script>
    <script src = "js/chat.js" defer = "true"></script>

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('userpic', $user['propic']); ?>

<?php $__env->startSection('body'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/homework2/resources/views/chat.blade.php ENDPATH**/ ?>