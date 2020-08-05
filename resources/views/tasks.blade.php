@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <table style="width: 100%" border="1">
            <tr>
                <th style="width: 25%">Taskname</th>
                <th style="width: 25%">Priority</th>
                <th style="width: 25%">Created</th>
                <th style="width: 25%">Updated</th>
            </tr>
            @foreach($tasks as $task)
                <tr>
                    <td style="width: 25%">{{ $task->name }}</td>
                    <td style="width: 25%">{{ $task->priority }}</td>
                    <td style="width: 25%">{{ $task->created_at }}</td>
                    <td style="width: 25%">{{ $task->updated_at }}</td>
                </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection
