<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @yield('title') -->
    {{$title}}
    <link rel="stylesheet" href="/app.css">
</head>
<style>
    .bg-yellow{
        background-color: yellow;
    }
</style>
<body>
<!-- Blade layout System -->
<!-- @yield('content') -->
<!-- In blogs,blog.blade.php extends,section and endsection -->

<!-- Blade component System -->
{{$slot}}
</body>
</html>