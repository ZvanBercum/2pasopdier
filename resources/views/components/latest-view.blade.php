<div class="latest-view {{$type}}">
    @foreach($items as $item)
        <x-item-card :item="$item" :type="$type"></x-item-card>
    @endforeach($item)
</div>
