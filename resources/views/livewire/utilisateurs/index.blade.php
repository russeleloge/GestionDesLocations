{{-- Pour forcer l'execution des evenements --}}
<div wire:ignore.self>

    {{-- On affiche la page en fonction de la condition --}}
    @if ($currentPage == PAGECREATEFORM)
        @include('livewire.utilisateurs.create')
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include('livewire.utilisateurs.edit')
    @endif

    @if ($currentPage == PAGELIST)
        @include('livewire.utilisateurs.liste')
    @endif


    <script>
        // sweetAlert est une librairie JS qui permet d'afficher de beaux messages
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
    
        // SweetAlert est une librairie JS qui permet d'afficher de beaux messages
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
                        @this.deleteUser(event.detail.message.data.user_id)
                    }
    
                    @this.resetPassword()
    
                }
            })
        })
    </script>

    {{-- @if ($isBtnAddClicked) --}}
        {{-- Appel du contenu de la vue create --}}
        {{-- @include('livewire.utilisateurs.create')
    @else --}}
        {{-- Appel du contenu de la vue liste --}}
        {{-- @include('livewire.utilisateurs.liste')
    @endif --}}

</div>
