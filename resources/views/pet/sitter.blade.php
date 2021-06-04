<x-app-layout>
    @if(empty($pets[0]))
        <div>Geen oppas huisdieren</div>
    @endif
    <x-overview :items="$pets" :type="'pet'" :mode="'job'"></x-overview>
</x-app-layout>
