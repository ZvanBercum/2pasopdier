<div class="profile">
    <img class="owner-picture" src={{URL::asset($subject->pref_picture ?? 'img/paw-black-shape.png')}} alt="{{$subject->name}}">
    @if(!is_null($subject->owner_id) && $subject->owner_id !== Auth::user()->id && is_null($subject->sitter_id))
        <form action="{{route('pet.accept', [$subject->id])}}" method="POST">
            @csrf
            @method('PUT')
        <button class="message" onclick="this.form.submit()"> <i class="fas fa-check"></i> Accepteer dier</button>
        </form>
    @elseif($subject->owner_id === Auth::user()->id)
        <button class="fav" onclick="window.location='{{ route('pet.edit',[$subject->id]) }}'"> <i class="far fa-edit"></i> Bewerk</button>
    @elseif(is_null($subject->owner_id) && Auth::user()->id === $subject->id)
{{--        <button class="message" disabled> <i class="fas fa-envelope"></i> Stuur bericht</button>--}}
        <button class="fav" onclick="window.location='{{ route('user_edit_profile') }}'"> <i class="far fa-edit"></i> Bewerk</button>
    @endif
    <h1 class="name">{{$subject->name}}</h1>
    @if(!is_null($subject->type) && !is_null($subject->type->name))
        <p class="type">{{$subject->type->name}}</p>
    @endif

    @if(!is_null($subject->rating))
        <x-rating :rated="$subject->rating"></x-rating>
    @endif
    <div class="icon-container location">
        <i class="fas fa-map-marker-alt"></i>
        @if(!is_null($subject->location))
            {{$subject->location}}

        @else
            {{$subject->user->location}}
        @endif
    </div>
    @if(!is_null($subject->type) && !is_null($subject->type->living_space))
        <div class="icon-container house">
            <i class="fas fa-home fa"></i>
            {{$subject->type->living_space}}
        </div>
    @endif
    @if(!is_null($subject->price) && !is_null($subject->rate))
        <div class="icon-container money">
            <i class="fas fa-euro-sign"></i>
            {{$subject->price}} per {{$subject->rate}}
        </div>
    @endif
    @if(!is_null($subject->start_time) && !is_null($subject->end_time))
        <div class="icon-container time">
            <i class="fas fa-calendar-alt"></i>
            @if(!is_null($subject->start_time))
                {{$subject->start_time->format('d-m-Y')}} - {{$subject->end_time->format('d-m-Y')}}
            @else
                Onbekend
            @endif
        </div>
    @endif
    @if(!is_null($subject->owner_id))
        <div class="icon-container owner" onclick="window.location='{{ route('user.show',[$subject->owner_id]) }}'">
            <i class="fas fa-user-alt"></i> {{$subject->user->name}}
        </div>
    @endif
    <hr>
    <p>
        {!! $subject->profile !!}
    </p>

    @if(!is_null($subject->requests))
    <hr>
    <h3>Oppasverzoeken</h3>
    @foreach($subject->requests as $request)
        @if(!$request->accepted)
        <form action="{{route('request.accept', [$request->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="icon-container owner" onclick="window.location='{{ route('user.show',[$request->sitter_id]) }}'">
                <i class="fas fa-user-alt"></i> {{$request->sitter->name}}
                <button onclick="this.form.submit()">Accepteer</button>
            </div>
        </form>
            @endif
    @endforeach
    @endif
</div>

