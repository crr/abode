@extends('layouts.app')

@section('content')
<div class="card card-inverse" style="background-color: #222; border-color: #000;">
  <div class="card-block">
    <h4 class="card-title">Logs</h4>
  </div>
  <ul class="list-group list-group-flush">
    @foreach ($logs as $log)
        <li class="list-group-item">
            <span class="label label-info" style="font-size: 16px;margin-right: 5px;"> {{ $abode->getUserName($log->user_id) }}</span> {{ $log->action }} <span class="label label-info pull-right" style="font-size: 16px;">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($log->created_at))->diffForHumans() }}</span><br>
            <i class="text-muted">{{ $log->email }}</i>
        </li>
    @endforeach
  </ul>
</div>
  <a href="{{ $logs->previousPageUrl() }}" class="btn btn-sm btn-info-outline pull-left">Previous</a>
  <a href="{{ $logs->nextPageUrl() }}" class="btn btn-sm btn-info-outline pull-right">Next</a>
@endsection
