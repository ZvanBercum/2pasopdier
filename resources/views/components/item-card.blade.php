<?php
$ages = ['adult'=> 'Volwassen', 'elderly' => 'Bejaard', 'child' => 'Jong'];
?>
<div class="card {{$type}}" data-card-name="{{$item->name}}" onclick="goTo{{ucfirst($type)}}({{ $item->id }})">
    <img src={{URL::asset($item->pref_picture ?? 'img/paw-black-shape.png')}} alt="Huisdierenfoto">
    <div class="card-info">
        <h2 class="name">{{$item->name}}</h2>
        @if($type === 'pet')
            <p class="type">{{$item->type->name}}</p>
        @endif
        <div class="icon-container location">
            <i class="fas fa-map-marker-alt"></i>
            {{ $item->location ?? $item->user->location }}
        </div>
        <div class="icon-container gender">
            <i class="fas fa-{{$item->gender}}"></i>
        @if($type === 'user')
                {{$item->age}}
            @endif
            @if($type === 'pet')
                {{$ages[$item->age] ?? '' }}
            @endif
        </div>
        @if($type === 'pet')
            <div class="icon-container house">
                <i class="fas fa-home fa"></i>
                {{$item->type->living_space}}
            </div>
            <div class="icon-container money">
                <i class="fas fa-euro-sign"></i>
                {{$item->price}} per {{$item->rate}}
            </div>
            <div class="icon-container time">
                <i class="fas fa-calendar-alt"></i>
                @if(!is_null($item->start_time))
                    {{$item->start_time}} - {{$item->end_time}}
                @else
                    Onbekend
                @endif
            </div>
        @endif
        @if($type === 'user')
            <div class="icon-container pets">
                <i class="fas fa-paw"></i>
                {{ count($item->pets)}}
            </div>
        @endif

        @if($type === 'user')
            <x-rating :rated="$item->rating"></x-rating>
        @else
            <x-rating :rated="$item->user->rating"></x-rating>
        @endif
    </div>
</div>
