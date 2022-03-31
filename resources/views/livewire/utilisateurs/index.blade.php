<div>


    @if ($isBtnAddClicked)
        {{-- Appel du contenu de la vue create --}}
        @include('livewire.utilisateurs.create')
    @else
        {{-- Appel du contenu de la vue liste --}}
        @include('livewire.utilisateurs.liste')
    @endif

</div>
