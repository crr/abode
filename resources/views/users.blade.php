@extends('layouts.app')

@section('content')
<div class="card card-inverse" style="background-color: #222; border-color: #000;">
  <div class="card-block">
    <h4 class="card-title">Residents</h4>
  </div>
  <ul class="list-group list-group-flush">
    @foreach ($users as $user)
        <li class="list-group-item">
            {{ $user->name }} <span class="label label-info">{{ $user->getRankTitle($user->rank) }}
        </li>
    @endforeach
  </ul>
</div>
@endsection
