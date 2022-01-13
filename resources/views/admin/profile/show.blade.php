<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- {{ $username }} --}}
    <div class="div">
        {{ $username->name }}
    </div>
    <div class="div">
        {{ $username->email }}
    </div>
    <div class="div">
        {{ $username->at }}
    </div>
    <div class="div">
        {{ $username->website }}
    </div>
</body>
</html>
