<x-app-layout class="petsOverview">
    <div class="filtering">
        <div class="icon-container search" onclick="openContainer()">
            <i class="fas fa-filter"></i>
            Filter dieren
        </div>
        <form id="filterForm" class="hidden">
            Hier zie je de {{count($pets)}} huisdieren die op zoek zijn naar een oppasser.
            <p>Plaats</p>
            <select id="location" onchange="filter(this)">
                <option value="noplace">Geen plaats geselecteerd</option>
                @foreach($places as $value)
                    @if($value == $def_loc)
                        <option selected value="{{$value}}">{{$value}}</option>
                    @else
                        <option value="{{$value}}">{{$value}}</option>
                    @endif
                @endforeach
            </select>
            <div>
                <p>Soort</p>
                <select id="type" onchange="filter(this)">
                    <option value="notype">Geen type geselecteerd</option>
                    @foreach($types as $key => $value)
                        @if($key == $def_type)
                            <option selected value="{{$key}}">{{$value}}</option>
                        @else
                            <option value="{{$key}}">{{$value}}</option>
                @endif
                @endforeach
                </select>
            </div>
        </form>
    </div>
    <x-overview :items="$pets" :type="'pet'" :mode="'view'"></x-overview>
</x-app-layout>
