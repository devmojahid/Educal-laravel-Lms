<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if (isset($subject))
            {{ $subject }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
</head>

<body>
    <h3>
        @if (isset($subject))
            {{ $subject }}
        @else
            {{ config('app.name') }}
        @endif
    </h3>
    <p>
        @if (isset($data))
            {{ sanitizeInput($data) }}
        @else
            {{ config('app.name') }}
        @endif
    </p>
</body>

</html>
