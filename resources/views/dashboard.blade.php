<x-app-layout>
    <h1 class="dashboard title">Nieuwste oppassers</h1>
    @if(Auth::user()->role()->get()[0]->upload_pets)
        <x-latest-view :items="$sitters" :type="'user'"/>
    @endif
    @if(Auth::user()->role()->get()[0]->accept_pets)
        <h1 class="dashboard title">Nieuwste oppasdieren</h1>
        <x-latest-view :items="$pets" :type="'pet'"/>
    @endif
</x-app-layout>
