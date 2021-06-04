<x-app-layout>
    <div class="admin_index">
        @if(Auth::user()->role()->get()[0]->remove_requests)
            <button onclick="window.location='{{ route('admin.requests') }}'">Verwijder aanvragen</button>
        @endif
        @if(Auth::user()->role()->get()[0]->block_users)
            <button onclick="window.location='{{ route('admin.block_users') }}'">Blokkeer gebruikers</button>
        @endif
    </div>
</x-app-layout>
