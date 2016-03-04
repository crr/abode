@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
<div class="card card-inverse" style="background-color: #222; border-color: #000;">
  <div class="card-block">
    <h4 class="card-title">Tasks</h4>
    <p class="card-text">You can add a task below that you'd like to be completed.</p>
    @include('common.errors')
    <form action="/task" method="POST" class="form-horizontal">
        {{ csrf_field() }}
                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}" placeholder="Type a task here.">
    </form>
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
    <h4 class="card-title">All Tasks</h4>
  </div>
        <ul class="list-group list-group-flush">
            @foreach ($alltasks as $task)
                <li class="list-group-item">
                    <span class="label label-info">{{ $task->user->name }}</span> {{ $task->name }}
                </li>
            @endforeach
          </ul>
</div>
        </div>
    </div>
@endsection
