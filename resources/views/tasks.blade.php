@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
<div class="card card-inverse" style="background-color: #222; border-color: #000;">
  <div class="card-block">
    <h4 class="card-title">Tasks</h4>
    @if(Auth::User()->isResident() || Auth::User()->isAdmin())
    <p class="card-text">You can add a task below that you'd like to be completed.</p>
    @include('common.errors')
    <form action="/task" method="POST" class="form-horizontal">
        {{ csrf_field() }}
                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}" placeholder="Type a task here.">
    </form>
    @else
    <p style="margin-bottom:0px;"><span class="label label-danger">Note:</span> You are unable to add tasks as you are <u>not a resident</u>, however you can still view them below.</p>
    @endif
</div>
  <ul class="list-group list-group-flush">
    @foreach ($tasks as $task)
        <li class="list-group-item">
            <form action="/task/{{ $task->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger-outline btn-sm pull-right">
                    <i class="fa fa-btn fa-trash"></i>Delete
                </button>
            </form>
        <span class="label label-info">Me</span>  {{ $task->name }}
        </li>
    @endforeach
  </ul>
</div>
<br>
<div class="card card-inverse" style="background-color: #222; border-color: #000;">
  <div class="card-block">
    <h4 class="card-title"><i class="fa fa-check"></i> All Tasks</h4>
  </div>
        <ul class="list-group list-group-flush">

        @if(!count($alltasks))
            <li class="list-group-item">
                We're sorry, <b>{{ Auth::User()->name }}</b>. There are not currently any tasks.
            </li>
        @endif

            @foreach ($alltasks as $task)
                <li class="list-group-item">
                @if (Auth::User()->isAdmin())
                <form action="/task/{{ $task->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger-outline btn-sm pull-right">
                        <i class="fa fa-btn fa-trash"></i>Delete
                    </button>
                </form>
                @endif
                    <span class="label label-info pull-right" style="font-size: 16px;">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($task->created_at))->diffForHumans() }}</span>
                    <span class="label label-info" style="font-size: 16px;">{{ $task->user->name }}</span> {{ $task->name }}
                </li>
            @endforeach
          </ul>
</div>
        </div>
    </div>
@endsection
