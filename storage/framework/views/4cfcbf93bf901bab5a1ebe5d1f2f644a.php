<?php $__env->startSection('pagetitle', 'Diapason - Utenti'); ?>

<?php $__env->startSection('head_content'); ?>
  <link rel = "stylesheet" href = "<?php echo e(url('css/search_results.css')); ?>">
  <link rel = "stylesheet" href = "<?php echo e(url('css/search_posts.css')); ?>">

  <script src = "<?php echo e(url('js/search_users.js')); ?>" defer = "true"></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('userpic', $user['propic']); ?>
<?php $__env->startSection('search_bar'); ?>
        <form name = "header-search" method = "get" >
          <input type = 'text' name = 'user-search' placeholder = 'cerca utenti' id = 'search-box' autocomplete = "off">
          <input type = 'submit' value = '' id = 'search-submit'>
        </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

        <h2 id = "search-info">
            <?php echo e($welcome); ?>

        </h2>

        <article>
            <section>
            </section>
        </article>

        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/homework2/resources/views/search_users.blade.php ENDPATH**/ ?>