<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>test</title>
    <meta name="csrf-token"   content="{{ csrf_token() }}">

</head>
<body>
    <h1>test</h1>
    <div id="app"></div>
    <div class="container">
        <h1>Laravel Broadcast Redis Socket io</h1>

        <div id="notification"></div>
    </div>
    <script src="{{asset('./bundle-front.js')}}"></script>
</body>
</html>
