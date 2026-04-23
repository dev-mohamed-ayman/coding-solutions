<!doctype html>
<html class="dark" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($htmlDir ?? 'ltr'); ?>">
  <?php echo $__env->make('web.layouts.partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <body class="font-body selection:bg-primary selection:text-on-primary">
    <?php echo $__env->make('web.layouts.partials.loader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('web.layouts.partials.background', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('web.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="pt-28 pb-24 px-6 max-w-7xl mx-auto relative z-10">
      <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('web.layouts.partials.floating-actions', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('web.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('web.layouts.partials.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </body>
</html>
<?php /**PATH C:\Users\Mohamed Ayman\Herd\Coding solutions\codiing-solutions\resources\views/web/layouts/app.blade.php ENDPATH**/ ?>