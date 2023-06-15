<?php $__env->startSection('pagetitle', 'Diapason - Pubblica'); ?>

<?php $__env->startSection('head_content'); ?>
  <link rel = "stylesheet" href = "<?php echo e(url('css/post.css')); ?>">
  <script src = "<?php echo e(url('js/post.js')); ?>" defer = "true"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('userpic', $user['propic']); ?>

<?php $__env->startSection('body'); ?>

    <h2>

      Pubblica qualcosa!

    </h2>

    <article>
      <section id = 'post'>
        <form name = 'form-post' method = 'post'>
          <input type = 'text' name = 'post-title' placeholder = "Titolo del post" id = 'post-title' autocomplete = "off">
          <div id = 'review-container'>
            <label class = 'row-lab'><input type = "checkbox" name = 'is-review' >Recensione </label>
            <div id = review>
              <label class = 'col-lab'>
                <img id = 'default-album' src = "<?php echo e(url('images/placeholder_icon.svg')); ?>">
                <input type = 'text' name = 'album-title' placeholder = "titolo dell'album" data-review = "true" autocomplete = "off">
                <input type = 'text' name = 'album-artist' placeholder = "artista" data-review = "true" autocomplete = "off">
                <input type = 'hidden' name = 'cover-url' data-review = "true">
              </label>
              <label class = 'row-lab'> Voto: <input type = 'number' name = 'score' min = '0' max = '100' data-type = 'score' data-review = "true">/100</label>
              <div id = "overlay"></div>
            </div>
          </div>
          <textarea name = 'desc' placeholder = 'A cosa stai pensando?' value = ''></textarea>
          <input type = 'submit' value = 'PUBBLICA' class = 'ok-button'>
        </form>
      </section>
      <section id = 'post-modal' class = 'hidden modal'>
        <div id = 'in-modal'>
          <h1></h1>
          <p></p>

          <div class = 'ok-button'>Ok</div> 
        </div>
      </section>
    </article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/homework2/resources/views/post.blade.php ENDPATH**/ ?>