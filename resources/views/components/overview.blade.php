<div class="overview {{$type}}">
    @foreach($items as $item)
        <x-item-card :item="$item" :type="$type"></x-item-card>
    @endforeach
</div>