<x-app-layout class="profile">
    @if (session('status'))
        <div class="alert-status" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <x-profile :subject="$pet"></x-profile>
</x-app-layout>
