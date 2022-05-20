 
    <div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gestion des caractéristiques de
                        "<?php echo e(optional($selectedTypeArticle)->nom); ?>"</h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">
                                <input type="text" wire:model="newPropModel.nom"
                                    <?php $__errorArgs = ['newPropModel.estObligatoire'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> placeholder="Nom"
                                    class="form-control <?php $__errorArgs = ['newPropModel.nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                <?php $__errorArgs = ['newPropModel.nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="flex-grow-1">
                                <select class="form-control <?php $__errorArgs = ['newPropModel.estObligatoire'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    wire:model="newPropModel.estObligatoire">
                                    <option value="">--Champ Obligatoire--</option>
                                    <option value="1">OUI</option>
                                    <option value="0">NON</option>
                                </select>
                                <?php $__errorArgs = ['newPropModel.estObligatoire'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div><button class="btn btn-success" wire:click="addProp()">Ajouter</button></div>
                    </div>
                    <table class="table table-bordered">
                        <thead class="bg-primary">
                            <th>Nom</th>
                            <th>Est obligatoire</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $proprietesTypeArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($prop->nom); ?></td>
                                    
                                    <td><?php echo e($prop->estObligatoire == 0 ? 'NON' : 'OUI'); ?></td>
                                    <td>
                                        <button class="btn btn-link" wire:click="editProp(<?php echo e($prop->id); ?>)"> <i class="far fa-edit"></i> </button>
                                        
                                        <?php if(count($prop->articles) == 0): ?>
                                            <button class="btn btn-link"
                                                wire:click="showDeletePrompt('<?php echo e($prop->nom); ?>','<?php echo e($prop->id); ?>')">
                                                <i class="far fa-trash-alt"></i> </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3">
                                        <span class="text-info">Vous n'avez pas encore de propriétés définies pour
                                            ce type d'article</span>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="closeModal()">Fermer</button>
                </div>
            </div>
        </div>
    </div><?php /**PATH R:\apkGest\resources\views/livewire/typearticles/addProp.blade.php ENDPATH**/ ?>