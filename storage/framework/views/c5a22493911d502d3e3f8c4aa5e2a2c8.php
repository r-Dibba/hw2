<?php $__env->startSection('pagetitle', 'Cerca Eventi'); ?>

<?php $__env->startSection('head_content'); ?>
  <link rel = "stylesheet" href = "<?php echo e(url('css/events.css')); ?>">
  <script src = "<?php echo e(url('js/events.js')); ?>" defer = "true"></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('userpic', $user['propic']); ?>

<?php $__env->startSection('body'); ?>
    <h2 id = "search-info">
        Cerca eventi:
    </h2>

    <div id = "search-container">
            <p id = 'toggle-search'>Cerca Per Paese </p>
            <form name = "artist-search" method = "get" data-type = "artist">
            <input type = 'text' name = 'filter' placeholder = 'cerca artisti' id = 'search-box'>
            <input type = 'submit' value = '' id = 'search-submit'>
            </form>
        </div>

    <article>
      <section>
      </section>

    </article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/homework2/resources/views/events.blade.php ENDPATH**/ ?>