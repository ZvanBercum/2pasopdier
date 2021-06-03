<?php
$genders = ['male' => 'Mannelijk', 'female' => 'Vrouwelijk', 'anders' => 'Anders'];
$ages = ['child' => 'Jong', 'adult' => 'Volwassen', 'elderly' => 'Bejaard'];
//$roles = [2 => 'Oppasser', 3 => 'Eigenaar', 4 => 'Eigenaar + Oppasser'];
//$admin = $user->role == 1 ? true : false;
?>
<x-app-layout>
    <form class="profile-edit latest-view" action="{{ route('pet.update',$pet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Profiel bewerken voor {{$pet->name}}</h1>

        <div class="forminput">
            <x-label for="name" :value="_('Naam')"/>
            <x-input id="name" type="text" name="name" value="{{$pet->name}}" required/>
        </div>


        <div class="forminput file">
            <x-label for="pref_picture"  :value="_('Profielfoto')"/>
            <img class="owner-picture" src={{URL::asset($pet->pref_picture ?? 'img/paw-black-shape.png')}} alt="{{$pet->name}}">
            <input type="file" id="pref_picture" name="pref_picture"/>
        </div>

        <div class="forminput">
            <x-label for="gender" :value="__('Geslacht')"/>
            <select id="gender" name="gender" required>
                @foreach($genders as $key => $value)
                    @if($key == $pet->gender)
                        <option value="{{$key}}" selected>{{$value}}</option>
                    @else
                        <option value="{{$key}}">{{$value}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="forminput">
            <x-label for="location" :value="_('Woonplaats')"/>
            <x-input id="location" type="text" name="location" value="{{$pet->location ?? $pet->user->location}}" required/>
        </div>

        <div class="forminput">
            <x-label for="age" :value="__('Leeftijd')"/>
            <select id="age" name="age" required>
                @foreach($ages as $key => $value)
                    @if($key == $pet->age)
                        <option value="{{$key}}" selected>{{$value}}</option>
                    @else
                        <option value="{{$key}}">{{$value}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="forminput">
            <x-label for="type" :value="__('Type')"/>
            <select id="type" name="type" required>
                @foreach($types as $key => $value)
                    @if($key == $pet->type->id)
                        <option value="{{$key}}" selected>{{$value}}</option>
                    @else
                        <option value="{{$key}}">{{$value}}</option>
                    @endif
                @endforeach
            </select>
        </div>


        <div class="forminput">
            <x-label for="profile" :value="_('Profiel')"/>
            <textarea class="ckeditor" id="profile" name="profile" data-profile="{{$pet->profile}}" required></textarea>
        </div>
        <button type="submit">
            Opslaan
        </button>
    </form>
</x-app-layout>

