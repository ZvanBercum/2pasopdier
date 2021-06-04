<?php
$genders = ['male' => 'Mannelijk', 'female' => 'Vrouwelijk', 'anders' => 'Anders'];
$roles = [2 => 'Oppasser', 3 => 'Eigenaar', 4 => 'Eigenaar + Oppasser'];
$admin = $user->role == 1 ? true : false;
?>
<x-app-layout>
    <form class="profile-edit latest-view" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data"  method="POST">
        @csrf
        @method('PUT')
        <h1>Profiel bewerken voor {{$user->name}}</h1>

        <div class="forminput">
            <x-label for="name" :value="_('Naam')"/>
            <x-input id="name" type="text" name="name" value="{{$user->name}}" required/>
        </div>


        <div class="forminput file">
            <x-label for="pref_picture"  :value="_('Profielfoto')"/>
            <img class="owner-picture" src={{URL::asset($user->pref_picture ?? 'img/paw-black-shape.png')}} alt="{{$user->name}}">
            <input type="file" id="pref_picture" name="pref_picture"/>
        </div>

        <div class="forminput">
            <x-label for="gender" :value="__('Geslacht')"/>
            <select id="gender" name="gender" required>
                @foreach($genders as $key => $value)
                    @if($key == $user->gender)
                        <option value="{{$key}}" selected>{{$value}}</option>
                    @else
                        <option value="{{$key}}">{{$value}}</option>

                    @endif
             @endforeach
            </select>
        </div>

        <div class="forminput">
            <x-label for="location" :value="_('Woonplaats')"/>
            <x-input id="location" type="text" name="location" value="{{$user->location}}" required/>
        </div>

        <x-age-input/>

        <div class="forminput">
            <x-label for="role" :value="__('Ik ben een')"/>
            @if($admin)
                <select id="role" name="role" disabled required>
                    <option value="1" selected>Admin</option>
                </select>
            @else
                <select id="role" name="role" required>
                    @foreach($roles as $key => $value)
                        @if($key == $user->role)
                            <option value="{{$key}}" selected>{{$value}}</option>
                        @else
                            <option value="{{$key}}">{{$value}}</option>

                        @endif
                    @endforeach
                </select>
            @endif
        </div>

        <div class="forminput">
            <x-label for="profile" :value="_('Profiel')"/>
            <textarea class="ckeditor" id="profile" name="profile" data-profile="{{$user->profile}}" required></textarea>
        </div>
        <button type="submit">
            Opslaan
        </button>
    </form>
</x-app-layout>

