<div>
   
@include("livewire.typearticles.editProp")

@include("livewire.typearticles.addProp")

@include("livewire.typearticles.list")

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
                } else {
                    // Voici une facon d'appeler les fonctions livewire depuis le Javascript
                    @this.updateTypeArticle(e.detail.typearticle.id, value)
                }
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
                // Si on a le parametre data, on sait qu'il s'agit d'une suppression dans le cas
                // contraire, on reinitialise le mot de passe 
                //On teste l'element pour savoir s'il s'agit d'une suppression de proprietes ou de type d'articles
                if (event.detail.message.data.type_article_id) {
                    @this.deleteTypeArticle(event.detail.message.data.type_article_id)
                }

                if (event.detail.message.data.propriete_id) {
                    @this.deleteProp(event.detail.message.data.propriete_id)
                }

            }
        })
    })

    window.addEventListener("showModal", event => {
        $("#modalProp").modal('show');
    })

    window.addEventListener("closeModal", event => {
        $("#modalProp").modal('hide');
    })


    window.addEventListener("showEditModal", event => {
        $("#editModalProp").modal('show');
    })

    window.addEventListener("closeEditModal", event => {
        $("#editModalProp").modal('hide');
    })
</script>
