 <div class="row p-4 pt-5">
     <div class="col-12">
         <div class="card">
             <div class="card-header bg-gradient-primary d-flex align-items-center">
                 <h3 class="card-title flex-grow-1"><i class="fas fa-list fa-2x"></i> Liste des articles
                 </h3>

                 <div class="card-tools d-flex align-items-center ">
                     {{-- On ajoute prevent pour eviter de recharger la page comme il s'agit d'un lien (<a></a>) --}}
                     <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="toggleShowAddTypeArticleForm"><i
                             class="fas fa-user-plus"></i> Nouveau
                         article</a>
                     <div class="input-group input-group-md" style="width: 250px;">
                         <input type="text" name="table_search" class="form-control float-right" {{-- debounce permet d'eviter de lancer des requetes AJAX a chq fois qu'il y'a la recherche a effectuer --}}
                             {{-- 250ms represente le temps a patienter avant d'envoyer la requete(optimisation du code(envoi d'une seule requete)) pour eviter d'envoyer les requetes instantanement --}} wire:model.debounce.250ms="search" placeholder="Rechercher">

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
                            @foreach ($typearticles as $typearticle)
                                <option value="{{$typearticle->id}}">{{$typearticle->nom}}</option>
                            @endforeach 
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


                         @forelse ($articles as $article)
                             <tr>
                                <td> <img src="{{ asset('images/user.png') }}" alt="" style="with:60px; height:60px;" /></td>
                                 <td>{{ $article->nom }} - {{ $article->noSerie }}</td>
                                 {{-- optional permet d'appliquer l'action que si l'element n'est pas nul --}}
                                 <td class="text-center">{{ $article->type->nom }}</td>
                                 <td class="text-center">
                                     @if ($article->estDisponible)
                                         <span class="badge badge-success">Disponible</span>
                                     @else
                                         <span class="badge badge-danger">Indisponible</span>
                                     @endif
                                 </td>
                                  <td class="text-center">
                                        {{ optional($article->created_at)->diffForHumans() }}</td>
                                    
                                 <td class="text-center">
                                     <button class="btn btn-link"
                                         wire:click="editArticle({{ $article->id }})"> <i
                                             class="far fa-edit"></i> </button>

                                     
                                     {{-- Le button ne s'affiche que si le typearticle initial n'appatient a aucun article --}}
                                     
                                         <button class="btn btn-link"
                                             wire:click="confirmDelete({{ $article->id }})">
                                             <i class="far fa-trash-alt"></i> </button>
                                    
                                 </td>
                             </tr>
                             @empty
                             {{-- Dans le cas ou on ne trouve rien --}}
                             <tr>
                                <td colspan="6">
                                    <div class="alert alert-danger">
                                       <h5><i class="icon fas fa-ban"></i>Information</h5>
                                        Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                    </div>
                                </td>
                             </tr>
                         @endforelse
                     </tbody>
                 </table>
                 </div>
             </div>
             <!-- /.card-body -->
             <div class="card-footer">
                 <div class="float-right">
                     {{ $articles->links() }}
                 </div>
             </div>
         </div>
         <!-- /.card -->
     </div>
 </div>
