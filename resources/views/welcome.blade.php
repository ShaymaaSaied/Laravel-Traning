<html>
<head>

</head>
<bode>
    <h1>
        Hello World
    </h1>

    @foreach($tasks as $task)
        {{--{{$task}}--}}
        {{$task->task}}
    @endforeach
</bode>
</html>