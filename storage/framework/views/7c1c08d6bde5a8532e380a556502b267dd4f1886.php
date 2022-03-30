

<?php $__env->startSection('contenu'); ?>
    
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('counter', [])->html();
} elseif ($_instance->childHasBeenRendered('71WrcqC')) {
    $componentId = $_instance->getRenderedChildComponentId('71WrcqC');
    $componentTag = $_instance->getRenderedChildComponentTagName('71WrcqC');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('71WrcqC');
} else {
    $response = \Livewire\Livewire::mount('counter', []);
    $html = $response->html();
    $_instance->logRenderedChild('71WrcqC', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\TAF\Taf_lara\Api_Gestion_Lara\resources\views/welcome.blade.php ENDPATH**/ ?>