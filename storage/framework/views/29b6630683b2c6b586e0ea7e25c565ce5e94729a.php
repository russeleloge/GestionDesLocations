<?php $__env->startSection('contenu'); ?>
    
    
    <div class="row">
        <div class="col-12 p-4">
            <div class="jumbotron ">
                    <h1 class="display-3">Bienvenu, <strong><?php echo e(userFullName()); ?></strong></h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\apkGest\resources\views/home.blade.php ENDPATH**/ ?>