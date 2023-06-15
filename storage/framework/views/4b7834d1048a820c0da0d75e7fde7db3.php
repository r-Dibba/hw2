<?php $__env->startSection('pagetitle', 'Account - '.$clicked_profile['username']); ?>

<?php $__env->startSection('head_content'); ?>
  <link rel = "stylesheet" href = "<?php echo e(url('css/search_results.css')); ?>">
    <link rel = "stylesheet" href = "<?php echo e(url('css/search_posts.css')); ?>">
    <link rel = "stylesheet" href = "<?php echo e(url('css/user_profile.css')); ?>">

    <script src = "<?php echo e(url('js/search_users.js')); ?>" defer = "true"></script>
    <script src = "<?php echo e(url('js/chat.js')); ?>" defer = "true"></script>
    <script src = "<?php echo e(url('js/user_profile.js')); ?>" defer = "true"></script>
    <script src = "<?php echo e(url('js/search_posts.js')); ?>" defer = "true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('userpic', $user['propic']); ?>

<?php $__env->startSection('body'); ?>
    <article>
        <div id = "user-banner" >
            <div class = "banner-row">

                <div id = "banner-left">
                    <img src = "<?php echo e(url($clicked_profile['propic'])); ?>" class = 'currentuser-propic'><br>
                    <p id = "rank">
                        Rank: <br>
                        <em> <?php echo e($clicked_profile['rank']); ?></em>
                    </p>
                </div>

                <div id = "banner-right">
                    <p id = "motto">
                      "<?php echo e($clicked_profile['motto']); ?>"
                    </p>
                    <h6>
                     ~<?php echo e($clicked_profile['username']); ?>

                    </h6>
                </div>

            </div>

            <div class = "banner-row">
                <div id = "bottom-left">
                    

                    <?php if($user['current_user'] != $clicked_profile['username']): ?>
                      <img src = "<?php echo e(url('images/svgicons/chat.svg')); ?>" id = 'banner-quick-msg'>

                      <img src = "<?php echo e(url('images/svgicons/add_user.svg')); ?>" data-user = "<?php echo e($clicked_profile['username']); ?>" id = 'banner-add-friend'>
                    <?php else: ?>
                      <img src = "<?php echo e(url('images/svgicons/settings.svg')); ?>" id = 'acc-settings'>
                    <?php endif; ?>


                  
                </div>

                <div id = "bottom-center">
                    <p class = "flw-info" data-flw-info = 'followed-by'>
                        Follower
                        <span><?php echo e($clicked_profile['amt_followedby']); ?></span>
                  </p>

                    <p class = "flw-info" data-flw-info = 'follows'>
                        Seguiti
                        <span><?php echo e($clicked_profile['amt_follows']); ?></span>
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
      
      <?php if($user['current_user'] != $clicked_profile['username']): ?>
        <section id = 'send-msg-modal' class = 'modal hidden'>
        <div id = 'in-modal' class = 'quick-msg'>
        <h1>Invia un Messaggio!</h1>
        <form name = 'sendmsg'>
          <input type = 'text' name = 'message' placeholder = 'scrivi' class = 'user-searchbox' autocomplete = 'off'>
          <input type = 'hidden' name = 'target-user' value = "<?php echo e($clicked_profile['username']); ?>">
          <input type = 'submit' name = 'send' value = '' class = 'searchbox-send'>
        </form>
        <p>
        </p>
        <div class = 'ok-button hidden'>
          Chiudi
        </div>
        </div>
      </section>
      
      
      <?php else: ?>
        <section id = 'acc-upd-modal' class = 'modal hidden'>
        <div id = 'in-modal' class = 'acc-settings'>
        <h1>Aggiorna Profilo</h1>
        <div id = 'forms-container'>
        <form name = 'form-propic' enctype = 'multipart/form-data' method = 'post'>
          <label> Aggiorna Immagine <img src = "<?php echo e(url($user['propic'])); ?>" class = 'currentuser-propic'><input type = 'file' name = 'propic' class = 'hidden'></label>
          <input type = 'submit' name = 'send' value = 'aggiorna'>
        </form>
        <form name = 'form-motto' id = 'form-motto' method = 'post'>
          <label> Aggiorna Motto <textarea name = 'upd-motto' placeholder = "<?php echo e($clicked_profile['motto']); ?>"></textarea> </label>
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
      <?php endif; ?>    
    </article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/homework2/resources/views/user_profile.blade.php ENDPATH**/ ?>