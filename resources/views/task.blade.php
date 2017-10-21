@extends('layouts.app')

@section('content')

    <div class="panel-body">

        <!-- New Task Form -->
        <form action="{{ url('/new') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="task" id="task" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>


    <div class="panel-body">

        @if (isset($tasks))
            @foreach ($tasks as $task)
                <p>
                    {{ $task['task'] }}

                    <form action="/task/{{ $task['id'] }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Delete Task</button>
                    </form>

                </p>
            @endforeach
        @endif

    </div>

@endsection
