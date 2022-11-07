@extends('layouts.homepage')
@section('main')
<div class="container">
    <div class="row">
        @foreach($asics as $asic)
    <div class="col-3">{{$asic->producer->name}}
    {{$asic->name}}
    {{$asic->hashrate}}
    </div>
@endforeach
</div>
</div>
    @stop


