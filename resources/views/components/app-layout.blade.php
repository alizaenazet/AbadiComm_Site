<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<header class="pt-[30px]">
    <x-navbar />
</header>
<body class="h-screen w-screen px-[156px] pb-[30px] bg-white flex-col justify-start items-center gap-[60px] inline-flex">
  {{ $slot }}
</body>
</html>