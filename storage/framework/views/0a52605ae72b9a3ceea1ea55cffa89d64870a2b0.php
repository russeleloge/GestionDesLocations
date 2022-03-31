        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-1">
                <div class="bg-dark">
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('images/user.png')); ?>" alt="User profile picture">
                          </div>
          
                          <h3 class="profile-username text-center ellipsis"><?php echo e(userFullname()); ?></h3>
          
                          <p class="text-muted text-center">
                          <?php $__currentLoopData = auth()->user()->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php echo e(\Illuminate\Support\Str::ucfirst($role->nom)); ?>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </p>
          
                          <ul class="list-group bg-dark mb-3">
                            <li class="list-group-item">
                              <a href="#" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b >Mot de passe</b> </a>
                            </li>
                            <li class="list-group-item">
                              <a href="#" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b >Mon profile</b> </a>
                            </li>
                          </ul>
          
          
                          <a href="<?php echo e(route('logout')); ?>"
                              onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                              class="btn btn-primary btn-block"><b>Déconnexion</b></a>
          
                          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                              <?php echo csrf_field(); ?>
                          </form>
                        </div>
                        <!-- /.card-body -->
                      </div>
              </div>
        </aside><?php /**PATH F:\apkGest\resources\views/components/sidebar.blade.php ENDPATH**/ ?>