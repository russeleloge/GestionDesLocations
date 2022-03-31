<div class="row p-4 pt-5">
    <div class="col-md-7">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel
                    utilisateur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
            <form role="form" wire:submit.prevent="addUser()">
                <div class="card-body">

                    

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="newUser.nom" 
                                class="form-control <?php $__errorArgs = ['newUser.nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            
                            <?php $__errorArgs = ['newUser.nom'];
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
                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="newUser.prenom"
                                class="form-control   <?php $__errorArgs = ['newUser.prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['newUser.prenom'];
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

                    <div class="form-group">
                        <label>Sexe</label>
                        <select class="form-control <?php $__errorArgs = ['newUser.sexe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> "
                            wire:model="newUser.sexe">
                            <option value="">---------</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                        <?php $__errorArgs = ['newUser.sexe'];
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

                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="text" wire:model="newUser.email"
                            class="form-control  <?php $__errorArgs = ['newUser.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['newUser.email'];
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

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone 1</label>
                            <input type="text" wire:model="newUser.telephone1"
                                class="form-control  <?php $__errorArgs = ['newUser.telephone1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['newUser.telephone1'];
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
                        <div class="form-group flex-grow-1">
                            <label>Telephone 2</label>
                            <input type="text" wire:model="newUser.telephone2" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Piece d'identité</label>
                        <select class="form-control  <?php $__errorArgs = ['newUser.pieceIdentite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            wire:model="newUser.pieceIdentite">
                            <option value="">---------</option>
                            <option value="CNI">CNI</option>
                            <option value="PASSPORT">PASSPORT</option>
                            <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                        </select>
                        <?php $__errorArgs = ['newUser.pieceIdentite'];
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

                    <div class="form-group">
                        <label>Numero de piece d'identité</label>
                        <input type="text" wire:model="newUser.numeroPieceIdentite"
                            class="form-control  <?php $__errorArgs = ['newUser.numeroPieceIdentite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['newUser.numeroPieceIdentite'];
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


                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="text" class="form-control" disabled placeholder="Password">
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
                    <button type="button" class="btn btn-danger mb-2" wire:click="goToListUser()">Retouner à la liste des
                        utilisateurs</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
</div>


<script>
    // sweetAlert est une librairie JS qui permet d'afficher de beaux messages
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
                }
            )
    })
</script>
<?php /**PATH F:\apkGest\resources\views/livewire/utilisateurs/create.blade.php ENDPATH**/ ?>