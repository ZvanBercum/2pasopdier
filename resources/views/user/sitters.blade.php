<x-app-layout class="sittersOverview">
    <div class="filtering">
        Hier zie je de {{count($sitters)}} beschikbare oppassers.
        <form>
            <p>Plaats</p>
            <select id="location" onchange="filterSitters(this)">
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
                <input id="minage" onchange="filterSitters(this)" class="min" type="number" min="{{$minage}}" max="{{$maxage}}" value="{{$minage}}" step="1"/>
                -
                <input id="maxage" onchange="filterSitters(this)" class="max" type="number" min="{{$minage}}" max="{{$maxage}}" value="{{$maxage}}" step="1"/>

             </div>
            <div id="gender">
                <p>Geslacht</p>
                <div>
                    <label for="male">Mannelijk</label>
                    <input onchange="filterSitters(this)" type="checkbox" id="male" name="male" {{$male ? "checked" : ''}}>
                </div>
               <div>
                   <label for="female">Vrouwelijk</label>
                   <input onchange="filterSitters(this)" type="checkbox" id="female" name="female" {{$female ? "checked" : ''}}>
               </div>
{{--                <div>--}}
{{--                    <label for="gender">Anders</label>--}}
{{--                    <input onchange="filterSitters(this)" type="checkbox" id="gender" name="gender">--}}
{{--                </div>--}}
            </div>
        </form>
    </div>
    <div></div>
    <x-overview :items="$sitters" :type="'user'"></x-overview>
</x-app-layout>
