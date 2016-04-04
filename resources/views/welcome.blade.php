@extends('layouts.app')

@section('content')
@if(!empty($response))
<p class="alert alert-info lead">{!! $response !!}</p>
@endif
<div class="col-md-6">
@if (!Auth::User())
    <h2>Welcome to the <b>{{ $abode->getName() }}</b>.</h2>
    <p class="lead">While a majority of this site is hidden to non-residents, you can view basic information about our household here.</p>
@else
    <h4>Welcome back, <b>{{ Auth::User()->name }}</b>.</h4>
@endif
</div>
<div class="col-md-6">
    <div class="card card-inverse" style="background-color: #222; border-color: #000;">
        <div class="card-block">
        <h4 class="card-title"><i class="fa fa-fire"></i> Thermostat
        @if($info->current_state->ac == '1')
        <span class="label label-success">On</span>
        @else
        <span class="label label-danger">Off</span>
        @endif
        </h4>
    </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
            The house is currently <span class="label label-info">{{ round($info->current_state->temperature)}}º{{ $info->scale }}</span> with a humidity of <span class="label label-info">{{ round($info->current_state->humidity) }}</span>.
            </li>
            <li class="list-group-item">
            The current target temperature is <span class="label label-info">{{ round($info->target->temperature) }}ºF</span> at the house.
            </li>
        </ul>
    </div>
    <div class="card card-inverse" style="background-color: #222; border-color: #000;">
        <div class="card-block">
        <h4 class="card-title"><i class="fa fa-home"></i> {{ $abode->getName() }}</h4>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                {{ $location->city }} is currently <span class="label label-info">{{ $location->outside_temperature }}ºF</span> degrees with a humidity of <span class="label label-info">{{ $location->outside_humidity }}</span>.
            </li>
        </ul>
    </div>
    @if (Auth::User())
    <div class="card card-inverse" style="background-color: #222; border-color: #000;">
        <div class="card-block">
        <h4 class="card-title" style="margin-bottom:10px;">Set temperature?</h4>
        <form role="form" method="POST" action="{{ url('/manage') }}">
            {!! csrf_field() !!}
            <input type="text" name="temp" class="form-control" placeholder="Type a temperature here. (60-75)">
        </form>
        </div>
    </div>
    <div class="card card-inverse" style="background-color: #222; border-color: #000;">
        <div class="card-block">
        <h4 class="card-title" style="margin-bottom:10px;">Control Thermostat</h4>
        <form role="form" method="POST" action="{{ url('/manage') }}" style="margin-bottom:10px;">
            {!! csrf_field() !!}
            @if($info->target->mode == 'off')
            <input type="hidden" name="on" value="1">
            <button type="submit" class="btn btn-danger-outline btn-block">Turn the <b>Nest</b> on</button>
            @else
            <input type="hidden" name="off" value="1">
            <button type="submit" class="btn btn-danger-outline btn-block">Turn the <b>Nest</b> off</button>
            @endif
        </form>
        <form role="form" method="POST" action="{{ url('/manage') }}" style="margin-bottom:10px;">
            {!! csrf_field() !!}
            <input type="hidden" name="fan15" value="1">
            <button type="submit" class="btn btn-info-outline btn-block">Turn the <b>Nest</b> fan on (for 15 minutes)</button>
        </form>
        <form role="form" method="POST" action="{{ url('/manage') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="fanoff" value="1">
            <button type="submit" class="btn btn-info-outline btn-block">Turn the <b>Nest</b> fan off</button>
        </form>
        </div>
    </div>
    @endif
</div>
@endsection
