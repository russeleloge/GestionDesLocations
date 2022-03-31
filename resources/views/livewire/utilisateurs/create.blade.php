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
            {{-- prevent permet d'eviter le comportement natif qui est la recharge de la page(submit) --}}
            <form role="form" wire:submit.prevent="addUser()">
                <div class="card-body">

                    {{-- <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label >Nom</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label >Prenom</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div> --}}

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="newUser.nom" {{-- l'input sera colorer en rouge si la condition de remplisssage de champ n'est pas respecter --}}
                                class="form-control @error('newUser.nom') is-invalid @enderror">
                            {{-- Si la condition de remplisssage de champ n'est pas respecter le sms d'erreur sera renvoyer --}}
                            @error('newUser.nom')
                                {{-- $message est une variable par defaut --}}
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="newUser.prenom"
                                class="form-control   @error('newUser.prenom') is-invalid @enderror">
                            @error('newUser.prenom')
                                {{-- $message est une variable par defaut --}}
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select class="form-control @error('newUser.sexe') is-invalid @enderror "
                            wire:model="newUser.sexe">
                            <option value="">---------</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                        @error('newUser.sexe')
                            {{-- $message est une variable par defaut --}}
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="text" wire:model="newUser.email"
                            class="form-control  @error('newUser.email') is-invalid @enderror">
                        @error('newUser.email')
                            {{-- $message est une variable par defaut --}}
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone 1</label>
                            <input type="text" wire:model="newUser.telephone1"
                                class="form-control  @error('newUser.telephone1') is-invalid @enderror">
                            @error('newUser.telephone1')
                                {{-- $message est une variable par defaut --}}
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Telephone 2</label>
                            <input type="text" wire:model="newUser.telephone2" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Piece d'identité</label>
                        <select class="form-control  @error('newUser.pieceIdentite') is-invalid @enderror"
                            wire:model="newUser.pieceIdentite">
                            <option value="">---------</option>
                            <option value="CNI">CNI</option>
                            <option value="PASSPORT">PASSPORT</option>
                            <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                        </select>
                        @error('newUser.pieceIdentite')
                            {{-- $message est une variable par defaut --}}
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Numero de piece d'identité</label>
                        <input type="text" wire:model="newUser.numeroPieceIdentite"
                            class="form-control  @error('newUser.numeroPieceIdentite') is-invalid @enderror">
                        @error('newUser.numeroPieceIdentite')
                            {{-- $message est une variable par defaut --}}
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 1500
                }
            )
    })
</script>
