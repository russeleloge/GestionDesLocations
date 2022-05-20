<div>

    <div class="modal fade" id="modalProp" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
            
            </div>
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" wire:click="closeModal()">Fermer</button>
            </div>
          </div>
        </div>
      </div>



    <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-primary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-list fa-2x"></i> Liste des types d'articles
                    </h3>

                    <div class="card-tools d-flex align-items-center ">
                        
                        <a class="btn btn-link text-white mr-4 d-block"
                            wire:click.prevent="toggleShowAddTypeArticleForm"><i class="fas fa-user-plus"></i> Nouveau
                            type d'article</a>
                        <div class="input-group input-group-md" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                  wire:model.debounce.250ms="search"
                                placeholder="Rechercher">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                
                                <th style="width:50%;">Type d'article</th>
                                <th style="width:20%;" class="text-center">Ajouté</th>
                                <th style="width:30%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($isAddTypeArticle): ?>
                                <tr>
                                    <td colspan="2">
                                        
                                        <input type="text" wire:keydown.enter="addNewTypeArticle"
                                            class="form-control <?php $__errorArgs = ['newTypeArticleName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            wire:model="newTypeArticleName" />
                                        <?php $__errorArgs = ['newTypeArticleName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-link" wire:click="addNewTypeArticle"> <i
                                                class="fa fa-check"></i>Valider</button>
                                        <button class="btn btn-link" wire:click="toggleShowAddTypeArticleForm()"> <i
                                                class="far fa-trash-alt"></i>Annuler</button>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php $__currentLoopData = $typearticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typearticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($typearticle->nom); ?></td>
                                    
                                    <td class="text-center">
                                        <?php echo e(optional($typearticle->created_at)->diffForHumans()); ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-link"
                                            wire:click="editTypeArticle(<?php echo e($typearticle->id); ?>)"> <i
                                                class="far fa-edit"></i> </button>

                                        <button class="btn btn-link" wire:click="showProp(<?php echo e($typearticle->id); ?>)">
                                            <i class="fa fa-list"></i>Propriétés </button>

                                        <button class="btn btn-link"
                                            wire:click="confirmDelete('<?php echo e($typearticle->nom); ?>', <?php echo e($typearticle->id); ?>)">
                                            <i class="far fa-trash-alt"></i> </button>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <?php echo e($typearticles->links()); ?>

                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<script>
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

    window.addEventListener("showEditForm", function(e) {
        Swal.fire({
            title: "Edition d'un type d'article",
            input: 'text',
            inputValue: e.detail.typearticle.nom,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Modifier <i class="fa fa-check"></i>',
            cancelButtonText: 'Annuler <i class="fa fa-times"></i>',
            inputValidator: (value) => {
                if (!value) {
                    return 'Champ obligatoire'
                } else {
                    // Voici une facon d'appeler les fonctions livewire depuis le Javascript
                    window.livewire.find('<?php echo e($_instance->id); ?>').updateTypeArticle(e.detail.typearticle.id, value)
                }
            }
        })
    })

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
                // Si on a le parametre data, on sait qu'il s'agit d'une suppression dans le cas
                // contraire, on reinitialise le mot de passe 
                if (event.detail.message.data) {
                    window.livewire.find('<?php echo e($_instance->id); ?>').deleteTypeArticle(event.detail.message.data.type_article_id)
                }

            }
        })
    })

    window.addEventListener("showModal", event => {
        $("#modalProp").modal('show')
    })

    window.addEventListener("closeModal", event => {
        $("#modalProp").modal('hide')
    })
</script>
<?php /**PATH F:\apkGest\resources\views/livewire/typearticles/index.blade.php ENDPATH**/ ?>