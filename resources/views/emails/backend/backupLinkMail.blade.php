<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if (isset($subject))
            {{ $subject }} | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
</head>

<body>
    <pre>
        <h3>{{ $subject }}</h3>
        
        <a href="{{ url($data['backupLink']) }}" target="_blank" >Download Backup</a>
        <a href="{{ asset($data['backupLink']) }}" target="_blank" > download</a>

        <a href="https://facebook.com">facebook</a>
      
    <pre>

    

</body>

</html>
