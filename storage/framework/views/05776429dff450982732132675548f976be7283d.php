<div>


    <?php if($isBtnAddClicked): ?>
        
        <?php echo $__env->make('livewire.utilisateurs.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        
        <?php echo $__env->make('livewire.utilisateurs.liste', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

</div>
<?php /**PATH F:\apkGest\resources\views/livewire/utilisateurs/index.blade.php ENDPATH**/ ?>