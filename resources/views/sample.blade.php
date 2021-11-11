<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


</head>
<body>
<div>
    <h>
        This is a sample page.
    </h>

    <div>
        @if(isset($contents))
            @foreach($contents as $content)

                <div class="flex flex-row">
                    <div>{{$content->title}}</div>
                    <div>{{$content->content}}</div>
                    <div>{{$content->author}}</div>
                </div>
            @endforeach

        @endif


    </div>
</div>
</body>
</html>
