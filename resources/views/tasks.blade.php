@extends('layouts.base')

@section('title', 'Update Task')

@section('fonts')
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
@endsection

@prepend('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endprepend

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script type="text/javascript">

        function updateRadioValue() {
            var radio = document.querySelector('input[name="taskRadio"]:checked').value;
            var editButton = document.getElementById("editButton");
            editButton.setAttribute("href", "/tasks/"+ radio +"/edit");
            document.getElementById("deleteForm").action = "/tasks/" + radio;
        }


        $(function () {

            $( "#tablecontents" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    updatePriority();
                }
            });

            function updatePriority() {
                var changePriority = [];

                $('tr.row1').each(function(index,element) {
                    let id = $(this).attr('data-id');
                    let oldPriority = $(this).find('td:eq(1)').text();
                    let newPriority = index+1;

                    if (newPriority != oldPriority) {
                         $(this).find('td:eq(1)').text(newPriority);

                        changePriority.push({
                            id: id,
                            priority: newPriority,
                        });
                    }
                });
                //console.log(JSON.stringify(changePriority));

                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('/tasks/update-priority') }}",
                    data: {data:changePriority},
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response.message);
                        } else {
                            console.log(response.message);
                        }
                    }
                });
            }
        });
    </script>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <h3 class="text-center mb-4">Task Manager </h3>

            <a type="button" class="btn btn-primary" href="/tasks/create">Create</a>
            <a type="button" id="editButton" class="btn btn-secondary" href="">Edit</a>
            <form id="deleteForm" style="display:inline-block" method="POST" action="/tasks/12">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-secondary">Delete</button>
            </form>

            <br>
            <br>

            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="30px"></th>
                        <th width="30px">Priority</th>
                        <th width="30px">Id</th>
                        <th>Name</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody id="tablecontents">
                    @foreach($tasks as $task)
                    <tr class="row1" data-id="{{ $task->id }}">
                        <td><input type="radio" name="taskRadio" value="{{$task->id}}" onclick="updateRadioValue()"/></td>
                        <td style="cursor:grab">{{ $task->priority }}</td>
                        <td style="cursor:grab">{{ $task->id }}</td>
                        <td style="cursor:grab">{{ $task->name }}</td>
                        <td style="cursor:grab">{{ date('d-m-Y h:m:s', strtotime($task->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
