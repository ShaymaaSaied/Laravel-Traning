<html>

<head>

</head>
<body>
<h1>
    Hello World
</h1>
<ul>
    @foreach($tasks as $task)
        {{--{{$task}}--}}
        <li>
            <a href="/tasks/{{$task->id}}">{{$task->task}}</a>
        </li>

    @endforeach
</ul>
</body>
</html>