<div class="profile">
    <img class="owner-picture" src={{URL::asset($subject->pref_picture ?? 'img/paw-black-shape.png')}} alt="{{$subject->name}}">
    <button class="message"> <i class="fas fa-envelope"></i> Stuur bericht</button>
    <button class="fav"> <i class="far fa-star"></i> Maak favoriet</button>
    <h1 class="name">{{$subject->name}}</h1>
    <x-rating :rated="$subject->rating"></x-rating>
    <div class="icon-container location">
        <i class="fas fa-map-marker-alt"></i>
        {{ $subject->location}}
    </div>
    <hr>
</div>

