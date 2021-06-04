<?php
$ages = ['adult'=> 'Volwassen', 'elderly' => 'Bejaard', 'child' => 'Jong'];
if($type ===  'user'){
    $date = new DateTime($item->age);
    $now = new DateTime();
    $age = $now->diff($date)->y;
}elseif($type === 'pet'){
    $age = $ages[$item->age] ?? '';
}
?>
<div class="card {{$type}}" data-card-name="{{$item->name}}">
    <img src={{URL::asset($item->pref_picture ?? 'img/paw-black-shape.png')}} alt="Huisdierenfoto" onclick="goTo{{ucfirst($type)}}({{ $item->id }})">
    <div class="card-info" onclick="goTo{{ucfirst($type)}}({{ $item->id }})">
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
                {{$age}}
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
                    {{$item->start_time->format('d-m-Y')}} - {{$item->end_time->format('d-m-Y')}}
                @else
                    Onbekend
                @endif
            </div>
        @endif
        @if($mode == 'view')
            @if($type === 'user')
                <div class="icon-container pets">
                    <i class="fas fa-paw"></i>
                    {{ count($item->pets)}}
                </div>
            @endif

            @if($type === 'user')
                <x-rating :rated="$item->rating"></x-rating>
            @endif
        @endif
    </div>
    @if($mode == 'edit')
        <button onclick="window.location='{{ route($type.'.edit',[$item->id]) }}'">Bewerken</button>
    @endif
    @if($mode == 'job')
        <form action="{{route('leave_review', [$item->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="forminput">
                <label for="rating">Geef deze klus een aantal sterren:</label>
                <input id=rating name="rating" value="5" type="number" min="0" max="5">

            </div>
            <button onclick="this.form.submit()">Stop met oppassen</button>
        </form>
    @endif
</div>
