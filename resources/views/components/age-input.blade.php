<?php
$year = Date("Y") - 15;
$monthArray = [1 => "januari",2 => "februari", 3 => "maart", 4 => "april",5 => "mei", 6 => "juni",
    7 => "juli", 8 => "augustus", 9 => "september", 10 => "oktober", 11 => "november", 12 => "december"];

$age_month = null;
if(isset(Auth::user()->age)){
    $age = strtotime(Auth::user()->age);
    $age_day = (int) date('d', $age);
    $age_month = (int) date('m', $age);
    $age_year = (int) date('Y', $age);
}
?>
<div class="forminput age">
    <x-label for="age" :value="__('Geboortedatum')"/>
    <input id="age_day" type="number" name="age_day" min="1" max="31" value="{{$age_day ?? 0}}">
</div>

<div class="forminput age">
    <select id="age_month" name="age_month">
        @foreach($monthArray as $key => $value)
            @if($key == $age_month)
                <option value="{{$key}}" selected>{{$value}}</option>
            @else
                <option value="{{$key}}">{{$value}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="forminput age">
    <input id="age_year" type="number" name="age_year" min="1920" max="{{$year}}" value="{{$age_year ?? 0}}">
</div>
