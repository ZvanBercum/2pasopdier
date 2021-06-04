<?php
$genders = ['male' => 'Mannelijk', 'female' => 'Vrouwelijk', 'anders' => 'Anders'];
$ages = ['child' => 'Jong', 'adult' => 'Volwassen', 'elderly' => 'Bejaard'];
$rates = ['uur', 'dag', 'week', 'maand'];
?>
<x-app-layout>
    <form class="profile-edit latest-view" action="{{ route('pet.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <h1>Nieuw huisdier toevoegen</h1>

        <div class="forminput">
            <x-label for="name" :value="_('Naam')"/>
            <x-input id="name" type="text" name="name" required/>
        </div>

        <div class="forminput file">
            <x-label for="pref_picture"  :value="_('Profielfoto')"/>
            <img class="owner-picture" src={{URL::asset('img/paw-black-shape.png')}} alt="profielfoto">
            <input type="file" id="pref_picture" name="pref_picture"/>
        </div>

        <div class="forminput">
            <x-label for="gender" :value="__('Geslacht')"/>
            <select id="gender" name="gender" required>
                @foreach($genders as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>

        <div class="forminput">
            <x-label for="location" :value="_('Woonplaats')"/>
            <x-input id="location" type="text" name="location" value="{{Auth::user()->location}}" required/>
        </div>

        <div class="forminput">
            <x-label for="age" :value="__('Leeftijd')"/>
            <select id="age" name="age" required>
                @foreach($ages as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>

        <div class="forminput">
            <x-label for="type_id" :value="__('Type')"/>
            <select id="type_id" name="type_id" required>
                @foreach($types as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>

        <div class="forminput">
            <x-label for="price" :value="__('Prijs')"/>
            <input id="price" name="price" type="number" min="1" max="1000" required/>
        </div>

        <div class="forminput">
            <x-label for="rate" :value="__('Per')"/>
            <select id="rate" name="rate" required>
                @foreach($rates as $value)
                    <option value="{{$value}}">{{ucfirst($value)}}</option>
                @endforeach
            </select>
        </div>

        <div class="forminput">
            <x-label for="start_time" :value="__('Vanaf')"/>
            <input type="date" id="start_time" name="start_time" value="{{now()->format('Y-m-d')}}"/>
            <x-label for="end_time" :value="__('Tot')"/>
            <input type="date" id="end_time" name="end_time" value="{{now()->format('Y-m-d')}}"/>
        </div>

        <div class="forminput">
            <x-label for="profile" :value="_('Profiel')"/>
            <textarea class="ckeditor" id="profile" name="profile" data-profile="" required></textarea>
        </div>

        <button type="submit">
            Opslaan
        </button>
    </form>
</x-app-layout>

