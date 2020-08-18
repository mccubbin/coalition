@extends('layouts.base')

@section('content')

    @if ( 'tasks/create' === request()->path() )
        @php
            $formName = "Create Task";
            $action = route('tasks.store'); //store
            $method = 'POST';
            $nameValue = null;
            $priorityValue = null;
        @endphp
    @elseif ($task)
        @php
            $formName = "Edit Task";
            $action = route('tasks.update', $task->id); //update
            $method = 'PATCH';
            $nameValue = $task->name;
            $priorityValue = $task->priority;
        @endphp
    @endif

    <div style="margin:auto; width: 50%">
        <h2>{{ $formName }}</h2>

        <form method="POST" action="{{ $action }}">
            @csrf
            @method($method)

            <div class="form-group row">
                <label class="col-3 col-form-label">Name</label>
                <div class="col-9">
                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{$nameValue}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label">Priority</label>
                <div class="col-9">
                    <input name="priority" type="text" class="form-control" placeholder="Priority" value="{{$priorityValue}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-3 col-9">
                    <button type="submit" class="btn btn-primary">{{ $formName }}</button>
                </div>
            </div>
        </form>
    </div>

@endsection