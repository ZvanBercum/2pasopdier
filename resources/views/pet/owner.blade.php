<x-app-layout>
    <div class="center">
        <button onclick="window.location='{{ route('pet.add') }}'">Voeg een nieuw huisdier toe!</button>
    </div>
    <x-overview :items="$user->pets" :type="'pet'" :mode="'edit'"></x-overview>
</x-app-layout>
