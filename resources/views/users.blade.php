@extends('layouts.app')

@section('content')
<div class="card card-inverse" style="background-color: #222; border-color: #000;">
  <div class="card-block">
    <h4 class="card-title">Residents</h4>
  </div>
  <ul class="list-group list-group-flush">
    @foreach ($users as $user)
        <li class="list-group-item">
            <span class="label label-info" style="font-size: 16px;width:25px;height:25px;border-radius:999px;margin-right: 5px;"> {{ $user->id }}</span> {{ $user->name }} <span class="label label-info pull-right" style="font-size: 16px;">{{ $user->getRankTitle($user->rank) }}</span><br>
            <i class="text-muted">{{ $user->email }}</i>
        </li>
    @endforeach
  </ul>
</div>
@endsection
