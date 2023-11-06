<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/images/logo_small.svg">
  <title>{{$title}}</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-max w-screen pt-[30px] px-[156px] pb-[30px] bg-white flex-col justify-start items-center inline-flex" style="gap: {{$gap}}">
    <header class="w-full ">
        <x-navbar />
    </header>
  {{ $slot }}
</body>
</html>