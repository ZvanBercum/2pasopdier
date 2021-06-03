<nav class="navigation">
    <a href="{{ route('dashboard') }}">
        <x-application-logo/>
    </a>

    <div class="menu">
        @if(Auth::user()->role()->get()[0]->upload_pets)
            <a class="menu-btn" href="{{route('oppassers')}}">oppasMATCH!</a>
        @endif
        @if(Auth::user()->role()->get()[0]->accept_pets)
            <a class="menu-btn" href="{{route('dieren')}}">dierenMATCH!</a>
        @endif
    </div>
    <div class="user-options" onclick="openDropDown()">
        {{Auth::user()->name}}
        <i class="fas fa-caret-down"></i>
    </div>
    <div id="user-dropdown" class="hidden dropdown">
        <a class="btn" href="{{ route('user_edit_profile')}}">Bewerk Profiel</a>
        @if(Auth::user()->role()->get()[0]->upload_pets)
            <a class="btn" href="{{ route('owner_pets')}}">Huisdieren</a>
        @endif
        <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutForm').submit(); ">Uitloggen</a>
    </div>

    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>
</nav>
