
<div wire:ignore.self>

    
    <?php if($currentPage == PAGECREATEFORM): ?>
        <?php echo $__env->make('livewire.utilisateurs.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if($currentPage == PAGEEDITFORM): ?>
        <?php echo $__env->make('livewire.utilisateurs.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if($currentPage == PAGELIST): ?>
        <?php echo $__env->make('livewire.utilisateurs.liste', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


    <script>
        // sweetAlert est une librairie JS qui permet d'afficher de beaux messages
        window.addEventListener("showSuccessMessage", event => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast: true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 3000
            })
        })

        // SweetAlert est une librairie JS qui permet d'afficher de beaux messages
        window.addEventListener("showConfirmMessage", event => {
            Swal.fire({
                //    event.detail.message provient de la fonction confirmDelete
                title: event.detail.message.title,
                text: event.detail.message.text,
                icon: event.detail.message.type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Continuer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si on a le parametre data, on sait qu'il s'agit d'une suppression dans le
                    // contraire, on reinitialise le mot de passe 
                    if (event.detail.message.data) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').deleteUser(event.detail.message.data.user_id)
                    } else {
                        window.livewire.find('<?php echo e($_instance->id); ?>').resetPassword()
                    }
                }
            })
        })
    </script>

    
    
    
    
    

</div>
<?php /**PATH R:\apkGest\resources\views/livewire/utilisateurs/index.blade.php ENDPATH**/ ?>