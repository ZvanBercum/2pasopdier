<x-app-layout class="petsOverview">
    <div class="filtering">
        <div class="icon-container search" onclick="openContainer()">
            <i class="fas fa-filter"></i>
            Filter oppassers
        </div>
        <form id="filterForm" class="hidden">
            Hier zie je de {{count($sitters)}} beschikbare oppassers.
            <p>Plaats</p>
            <select id="location" onchange="filter(this)">
                <option value="noplace">Geen plaats geselecteerd</option>
                @foreach($places as $value)
                    @if($value === $def_loc)
                        <option selected value="{{$value}}">{{$value}}</option>
                    @else
                        <option value="{{$value}}">{{$value}}</option>
                    @endif
                @endforeach
             </select>
            <div id="age">
                <p>Leeftijd</p>
                <input id="minage" onchange="filter(this)" class="min" type="number" min="{{$minage}}" max="{{$maxage}}" value="{{$minage}}" step="1"/>
                -
                <input id="maxage" onchange="filter(this)" class="max" type="number" min="{{$minage}}" max="{{$maxage}}" value="{{$maxage}}" step="1"/>

             </div>
            <div id="gender">
                <p>Geslacht</p>
                <div>
                    <label for="male">Mannelijk</label>
                    <input onchange="filter(this)" type="checkbox" id="male" name="male" {{$male ? "checked" : ''}}>
                </div>
               <div>
                   <label for="female">Vrouwelijk</label>
                   <input onchange="filter(this)" type="checkbox" id="female" name="female" {{$female ? "checked" : ''}}>
               </div>
            </div>
        </form>
    </div>
    <x-overview :items="$sitters" :type="'user'" :mode="'view'"></x-overview>
</x-app-layout>
