 <div class="row p-4 pt-5">
     <div class="col-12">
         <div class="card">
             <div class="card-header bg-gradient-primary d-flex align-items-center">
                 <h3 class="card-title flex-grow-1"><i class="fas fa-list fa-2x"></i> Liste des articles
                 </h3>

                 <div class="card-tools d-flex align-items-center ">
                     
                     <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="toggleShowAddTypeArticleForm"><i
                             class="fas fa-user-plus"></i> Nouveau
                         article</a>
                     <div class="input-group input-group-md" style="width: 250px;">
                         <input type="text" name="table_search" class="form-control float-right" 
                              wire:model.debounce.250ms="search" placeholder="Rechercher">

                         <div class="input-group-append">
                             <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- /.card-header -->
             <div class="card-body table-responsive p-0 table-striped">
                <div class="d-flex justify-content-end p-4 bg-indigo">
                    <div class="form-group mr-3">
                        <label for="filtreType">Filter par type</label>
                        <select id="filtreType" wire:model="filtreType" class="form-control">
                        <option value=""></option>
                            <?php $__currentLoopData = $typearticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typearticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($typearticle->id); ?>"><?php echo e($typearticle->nom); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="filtreEtat">Filter par Etat</label>
                            <select id="filtreEtat" wire:model="filtreEtat" class="form-control">
                            <option value=""></option>
                                <option value="1">Disponible</option>
                                <option value="0">Indisponible</option>
                            </select>
                        </div>
                    </div>
                </div>
                 <div>
                    <table class="table table-head-fixed" style="height:350px">
                     <thead>
                         <tr>
                             <th></th>
                             <th class="text-center">Article</th>
                             <th class="text-center">Type</th>
                             <th class="text-center">Etat</th>
                             <th class="text-center">Ajouté</th>
                             <th class="text-center">Action</th>
                         </tr>
                     </thead>
                     <tbody>


                         <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                             <tr>
                                <td> <img src="<?php echo e(asset('images/user.png')); ?>" alt="" style="with:60px; height:60px;" /></td>
                                 <td><?php echo e($article->nom); ?> - <?php echo e($article->noSerie); ?></td>
                                 
                                 <td class="text-center"><?php echo e($article->type->nom); ?></td>
                                 <td class="text-center">
                                     <?php if($article->estDisponible): ?>
                                         <span class="badge badge-success">Disponible</span>
                                     <?php else: ?>
                                         <span class="badge badge-danger">Indisponible</span>
                                     <?php endif; ?>
                                 </td>
                                  <td class="text-center">
                                        <?php echo e(optional($article->created_at)->diffForHumans()); ?></td>
                                    
                                 <td class="text-center">
                                     <button class="btn btn-link"
                                         wire:click="editArticle(<?php echo e($article->id); ?>)"> <i
                                             class="far fa-edit"></i> </button>

                                     
                                     
                                     
                                         <button class="btn btn-link"
                                             wire:click="confirmDelete(<?php echo e($article->id); ?>)">
                                             <i class="far fa-trash-alt"></i> </button>
                                    
                                 </td>
                             </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                             
                             <tr>
                                <td colspan="6">
                                    <div class="alert alert-danger">
                                       <h5><i class="icon fas fa-ban"></i>Information</h5>
                                        Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                    </div>
                                </td>
                             </tr>
                         <?php endif; ?>
                     </tbody>
                 </table>
                 </div>
             </div>
             <!-- /.card-body -->
             <div class="card-footer">
                 <div class="float-right">
                     <?php echo e($articles->links()); ?>

                 </div>
             </div>
         </div>
         <!-- /.card -->
     </div>
 </div>
<?php /**PATH R:\apkGest\resources\views/livewire/articles/list.blade.php ENDPATH**/ ?>