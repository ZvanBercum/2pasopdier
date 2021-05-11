<x-app-layout class="profile">
    <x-profile :subject="$user"></x-profile>

    <div class="profile-pets">
        <h2 class="name">{{$user->name}}'s Huisdieren</h2>
        <x-latest-view :items="$user->pets" :type="'pet'"></x-latest-view>
    </div>
</x-app-layout>
