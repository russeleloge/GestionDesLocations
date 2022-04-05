<div>

    <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-primary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-list fa-2x"></i> Liste des types d'articles
                    </h3>

                    <div class="card-tools d-flex align-items-center ">
                        
                        <a class="btn btn-link text-white mr-4 d-block" wire:click="toggleShowAddTypeArticleForm"><i
                                class="fas fa-user-plus"></i> Nouveau type d'article</a>
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
                                        <input type="text" class="form-control <?php $__errorArgs = ['newTypeArticleName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model="newTypeArticleName" />
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
                                    
                                    <td class="text-center"><?php echo e(optional($typearticle->created_at)->diffForHumans()); ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-link"> <i class="far fa-edit"></i> </button>
                                        <button class="btn btn-link"> <i class="far fa-trash-alt"></i> </button>
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
<?php /**PATH F:\apkGest\resources\views/livewire/typearticles/index.blade.php ENDPATH**/ ?>