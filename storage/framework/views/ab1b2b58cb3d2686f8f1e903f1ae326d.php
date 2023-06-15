<?php $__env->startSection('pagetitle', 'Diapason - Home'); ?>
<?php $__env->startSection('head_content'); ?>
  <link rel = "stylesheet" href = "<?php echo e(url('css/search_posts.css')); ?>">
  <script src = "js/search_posts.js" defer = "true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('userpic', $user['propic']); ?>

<?php $__env->startSection('body'); ?>

    <h2 id = "search-info">

    </h2>


    <article>
    <h2 id = 'post-info'> Ultimi post dei tuoi seguiti: </h2>
    <section id = "show-posts">

    </section>
    </article>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/homework2/resources/views/home.blade.php ENDPATH**/ ?>