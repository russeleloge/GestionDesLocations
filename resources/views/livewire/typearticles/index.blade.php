<div>

    <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-primary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-list fa-2x"></i> Liste des types d'articles
                    </h3>

                    <div class="card-tools d-flex align-items-center ">
                        {{-- On ajoute prevent pour eviter de recharger la page comme il s'agit d'un lien (<a></a>) --}}
                        <a class="btn btn-link text-white mr-4 d-block"
                            wire:click.prevent="toggleShowAddTypeArticleForm"><i class="fas fa-user-plus"></i> Nouveau
                            type d'article</a>
                        <div class="input-group input-group-md" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                {{-- debounce permet d'eviter de lancer des requetes AJAX a chq fois qu'il y'a la recherche a effectuer --}} {{-- 250ms represente le temps a patienter avant d'envoyer la requete(optimisation du code(envoi d'une seule requete)) pour eviter d'envoyer les requetes instantanement --}} wire:model.debounce.250ms="search"
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
                                {{-- <th style="width:5%;"></th> --}}
                                <th style="width:50%;">Type d'article</th>
                                <th style="width:20%;" class="text-center">Ajouté</th>
                                <th style="width:30%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($isAddTypeArticle)
                                <tr>
                                    <td colspan="2">
                                        {{-- On attribue la fonctionnalité à la touche entrer du clavier --}}
                                        <input type="text" wire:keydown.enter="addNewTypeArticle"
                                            class="form-control @error('newTypeArticleName') is-invalid @enderror"
                                            wire:model="newTypeArticleName" />
                                        @error('newTypeArticleName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-link" wire:click="addNewTypeArticle"> <i
                                                class="fa fa-check"></i>Valider</button>
                                        <button class="btn btn-link" wire:click="toggleShowAddTypeArticleForm()"> <i
                                                class="far fa-trash-alt"></i>Annuler</button>
                                    </td>
                                </tr>
                            @endif

                            @foreach ($typearticles as $typearticle)
                                <tr>
                                    <td>{{ $typearticle->nom }}</td>
                                    {{-- optional permet d'appliquer l'action que si l'element n'est pas nul --}}
                                    <td class="text-center">
                                        {{ optional($typearticle->created_at)->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-link"
                                            wire:click="editTypeArticle({{ $typearticle->id }})"> <i
                                                class="far fa-edit"></i> </button>
                                        <button class="btn btn-link" wire:click="confirmDelete('{{$typearticle->nom}}', {{$typearticle->id}})"> <i class="far fa-trash-alt"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        {{ $typearticles->links() }}
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
                }

                // Voici une facon d'appeler les fonctions livewire depuis le Javascript
                @this.updateTypeArticle(e.detail.typearticle.id, value)
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
                    // Si on a le parametre data, on sait qu'il s'agit d'une suppression dans le
                    // contraire, on reinitialise le mot de passe 
                    if (event.detail.message.data) {
                        @this.deleteTypeArticle(event.detail.message.data.type_article_id)
                    }
    
                }
            })
        })
         
</script>
