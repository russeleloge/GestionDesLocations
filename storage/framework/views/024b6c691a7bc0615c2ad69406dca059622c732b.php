
<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des utilisateurs
                </h3>

                <div class="card-tools d-flex align-items-center ">
                    
                    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddUser()"><i
                            class="fas fa-user-plus"></i> Nouvel
                        utilisateur</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width:5%;"></th>
                            <th style="width:25%;">Utilisateurs</th>
                            <th style="width:20%;">Roles</th>
                            <th style="width:20%;" class="text-center">Ajouté</th>
                            <th style="width:30%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php if($user->sexe == 'F'): ?>
                                        <img src="<?php echo e(asset('images/woman.png')); ?>" width="24" />
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/man.png')); ?>" width="24" />
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($user->prenom); ?> <?php echo e($user->nom); ?></td>
                                
                                <td><?php echo e($user->all_role_names); ?></td>
                                <td class="text-center">
                                    <span class="tag tag-success">
                                        
                                        <?php echo e($user->created_at->diffForHumans()); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-link" wire:click="goToEditUser(<?php echo e($user->id); ?>)"> <i class="far fa-edit"></i> </button>
                                    <button class="btn btn-link" wire:click="confirmDelete('<?php echo e($user->prenom); ?> <?php echo e($user->nom); ?>', <?php echo e($user->id); ?>)"> <i class="far fa-trash-alt"></i> </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    
                    <?php echo e($users->links()); ?>

                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div><?php /**PATH F:\apkGest\resources\views/livewire/utilisateurs/liste.blade.php ENDPATH**/ ?>